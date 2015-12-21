<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	protected $layout = 'layouts.master';

	public function dashboard()
	{		
		$this->layout->content = View::make('dashboard.index')->withTitle('Dashboard');
	}

	public function authenticate()
	{
		// Ambil credentials dari $_POST variable
		$credentials = array(
			'email' 	=> Input::get('email'),
			'password'	=> Input::get('password'),
		);

		try{
			//authentikasi user
			$user = Sentry::authenticate($credentials, false);
			//Redirect user ke dasboard
			return Redirect::intended('dashboard'); // yang mambuat tidak bisa diakses apabila tidak login (inteded)
		} catch (Cartalyst\Sentry\Users\WrongPasswordException $e) {			
			return Redirect::back()->with('errorMessage','Password yang Anda masukkan salah');
		} catch (Exception $e) {
			return Redirect::back()->with('errorMessage',trans('Email tidak terdaftar'));
		}
	}

	public function logout()
	{
		// logout user
		Sentry::logout();
		// Redirect user ke halaman login
		return Redirect::to('login')->with('successMessage','Anda berhasil logout');
	}

	public function editPassword()
	{
		//code
		$this->layout->content=View::make('dashboard.editpassword')->withTitle('Ubah Password');
	}

	public function updatepassword()
	{
		//code
		$user = Sentry::getUser();
		// validasi password lama
		if(!$user->checkPassword(Input::get('oldpassword'))) {
			return Redirect::back()->with('errorMessage', 'Password Lama Anda salah.');
		}
		// validasi konfirmasi password baru
		$rules = array('newpassword' => 'confirmed|required|min:5');
		$validator = Validator::make($data = Input::all(), $rules);
		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput();
		}
		// Simpan password baru
		$user->password = Input::get('newpassword');
		$user->save();
		// Redirect ke halaman sebelumnya
		return Redirect::back()->with('successMessage', 'Password berhasil diubah.');

	}
}