<?php

class ProfilesController extends \BaseController {

	/**
	 * Display a listing of profiles
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = Sentry::getUser();
		return View::make('profiles.index')->withTitle('Profil')->withUser($user);
	}

	/**
	 * Show the form for creating a new profile
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('profiles.create');
	}

	/**
	 * Store a newly created profile in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Profile::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Profile::create($data);

		return Redirect::route('profiles.index');
	}

	/**
	 * Display the specified profile.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$profile = Profile::findOrFail($id);

		return View::make('profiles.show', compact('profile'));
	}

	/**
	 * Show the form for editing the specified profile.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)

	{
		$user = Sentry::getUser();
		return View::make('profiles.edit')->withTitle('Ubah Profil')->withUser($user);
	}

	/**
	 * Update the specified profile in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$profile = User::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Profile::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$profile->update($data);

		return Redirect::route('profile.index')->with("successMessage", "Berhasil mengubah profil. ");
	}

	/**
	 * Remove the specified profile from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Profile::destroy($id);

		return Redirect::route('profiles.index');
	}

}
