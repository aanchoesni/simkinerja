<?php

class GuestController extends BaseController{
	
	/**
	 * Layout yang akan digunakan untuk controller ini
	 */

	protected $layout = 'layouts.login';

	public function login()
	{
		$this->layout->content = View::make('guest.login');
	}

	public function signup()
	{
		$this->layout->content = View::make('guest.signup');
	}
	public function forgotpassword()
	{
		$this->layout->content = View::make('guest.forgot');
	}
	
	/**
	* Kirim email reset password
	* @return response
	*/
	public function sendResetCode()
	{
		// Validasi email dan catcha
		$rules = array(
			'email' => 'required|exists:users',
		);

		$validator = Validator::make($data = Input::all(), $rules);
		
		// Redirect jika validasi gagal
		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput();
		}
		
		$user = Sentry::findUserByLogin(Input::get('email'));
		$data = array(
			'email' => $user->email,
			// Generate code untuk password reset
			'resetCode' => $user->getResetPasswordCode(),
		);
		
		// Kirim email untuk reset password
		Mail::send('emails.auth.reminder', $data, function ($message) use ($user) {
			$message->to($user->email, $user->first_name . ' ' . $user->last_name)->subject('Reset Password SIM KINERJA LPPM UNESA');
		});

		// Redirect ke halaman login
		return Redirect::to('login')->with("successMessage", "Silahkan cek email Anda ($user->email) untuk me-reset password.");
	}

	/**
	* Tampilkan halaman untuk membuat password baru
	* @param string $token
	* @return response
	*/
	public function createNewPassword()
	{
		try {
			$user = Sentry::findUserByLogin(Input::get('email'));
			if($user->checkResetPasswordCode(Input::get('resetCode'))) {
				$this->layout->content = View::make('guest.resetpassword')
					->with('email', $user->email)
					->with('resetCode', Input::get('resetCode'));
			} else {
				return Redirect::route('guest.login')->with('errorMessage', 'Reset code tidak valid.');
			}
		} catch (UserNotFoundException $e) {
		return Redirect::to('login')->with('errorMessage', $e->getMessage());
		}
	}

	/**
	* Simpan password user yang baru
	* @param string $token
	* @return response
	*/
	public function storeNewPassword()
	{
		try
		{
			// Cari user berdasarkan email
			$user = Sentry::findUserByLogin(Input::get('email'));
			// Check apakah resetCode valid
			if ($user->checkResetPasswordCode(Input::get('resetCode')))
			{
				// Validasi password baru
				$rules = array('password' => 'confirmed|required|min:5');
				$validator = Validator::make($data = Input::all(), $rules);
				// Redirect jika validasi gagal
				if ($validator->fails()) {
					return Redirect::back()->withErrors($validator)->withInput();
				}
				// Reset password user
				$user->attemptResetPassword(Input::get('resetCode'), Input::get('password'));
				return Redirect::to('login')->with('successMessage', 'Berhasil me-reset password. Silahkan login dengan password baru.');
			}
			else
			{
				return Redirect::to('login')->with('errorMessage', 'Reset code tidak valid.');
			}
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
			return Redirect::to('login')->with('errorMessage', $e->getMessage());
		}
	}
}
?>