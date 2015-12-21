<?php

class KaryawansController extends \BaseController {

	/**
	 * Display a listing of karyawans
	 *
	 * @return Response
	 */
	public function index()
	{
		$karyawans = DB::table('viewkaryawan')->get();
		$karyawans = 
		[
			'karyawans' => $karyawans
		];
		return View::make('karyawans.index', $karyawans)->withTitle('Karyawan');
	}

	/**
	 * Show the form for creating a new karyawan
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('karyawans.create')->withTitle('Tambah Karyawan');
	}

	/**
	 * Store a newly created karyawan in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Karyawan::$rules);
		
		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		// Register User tanpa diaktivasi
		$user = Sentry::register(array(
			'email' => Input::get('email'),
			'password' => Input::get('password'),
			'first_name' => Input::get('first_name'),
			'last_name' => Input::get('last_name'),
			'nip' => Input::get('nip'),
			'unit_kerja' => Input::get('unit_kerja'),
			'unit' => Input::get('unit'),
			'jabatan' => Input::get('jabatan')
		), false);
		// Cari grup regular
		$regularGroup = Sentry::findGroupById(Input::get('group'));
		
		// Masukkan user ke grup regular
		$user->addGroup($regularGroup);
		
		// Persiapkan activation code untuk dikirim ke email
		$data = [
			'email'=>$user->email,
			// Generate kode aktivasi
			'activationCode'=>$user->getActivationCode()
		];
		
		// Kirim email aktivasi
		Mail::send('emails.auth.register', $data, function ($message) use ($user) {
		$message->to($user->email, $user->first_name . ' ' . $user->last_name)->subject('Aktivasi Akun SIM Kinerja LPPM UNESA');
		});

		// Redirect ke halaman login
		return Redirect::route('admin.karyawan.index')->with("successMessage", "Berhasil disimpan. Silahkan cek email ($user->email) untuk melakukan aktivasi akun.");
	}

	/**
	 * Display the specified karyawan.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$karyawan = Karyawan::findOrFail($id);

		return View::make('karyawans.show', compact('karyawan'));
	}

	/**
	 * Show the form for editing the specified karyawan.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$karyawan = User::find($id);

		return View::make('karyawans.edit', ['karyawan'=>$karyawan])->withTitle("Ubah $karyawan->first_name");
	}

	/**
	 * Update the specified karyawan in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array(
			'first_name' => 'required',
			'unit_kerja' => 'required|exists:unitkerjas,id',
			'unit' => 'required|exists:units,id',
			'jabatan' => 'required|exists:jabatans,id',
		);

		$karyawan = User::findOrFail($id);

		$validator = Validator::make($data = Input::only('first_name','last_name','nip','unit_kerja','unit','jabatan'), $rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		} else
		{
			//code
			DB::table('users')
      			->where('id', $id)
      			->update(array(
                  'first_name' => Input::get('first_name'),
                  'last_name' => Input::get('last_name'),
                  'nip' => Input::get('nip'),
                  'unit_kerja' => Input::get('unit_kerja'),
                  'unit' => Input::get('unit'),
                  'jabatan' => Input::get('jabatan'),
            ));

      		// Find the user using the user id
    		//$usergroupremove = Sentry::getUserProvider()->findById($id);
    		// Find the group using the group id
    		//$groupremove = Sentry::findGroupById($usergroupremove->getGroups());
      		// Assign the group to the user
    		//$usergroupremove->removeGroup($groupsremove);
      		
      		// Find the user using the user id
      		//$user = Sentry::findUserById($id);
      		// Find the group using the group id
    		//$adminGroup = Sentry::findGroupById(Input::get('group'));
    		// Assign the group to the user
    		//$user->addGroup($adminGroup);
	    	//$user->save();
		}

		$karyawan->update($data);

		return Redirect::route('admin.karyawan.index')->with("successMessage", "Berhasil menyimpan $karyawan->first_name. ");
	}

	/**
	 * Remove the specified karyawan from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		User::destroy($id);

		return Redirect::route('admin.karyawan.index')->with('successMessage','Karyawan berhasil dihapus. ');
	}

	/**
	* Aktivasi seorang user
	* @param string $activationCode
	* @return response
	*/
	public function activate()
	{
		$email = Input::get('email');
		$activationCode = Input::get('activationCode');
		
		try {
			$user = Sentry::findUserByLogin($email);
			$user->attemptActivation($activationCode);
		} catch (UserAlreadyActivatedException $e) {
			return Redirect::route('guest.login')->with('errorMessage', $e->getMessage());
		} catch (UserNotFoundException $e) {
			return Redirect::route('guest.login')->with('errorMessage', $e->getMessage());
		}
		return Redirect::to('login')->with('successMessage', 'Akun Anda berhasil diaktivasi, silahkan login.');
	}

}
