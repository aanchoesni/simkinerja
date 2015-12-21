<?php

class UnitkerjasController extends \BaseController {

	/**
	 * Display a listing of unitkerjas
	 *
	 * @return Response
	 */
	public function index()
	{
		$unitkerjas = DB::table('unitkerjas')->get();
		$unitkerjas = 
		[
			'unitkerjas' => $unitkerjas
		];
		return View::make('unitkerjas.index', $unitkerjas)->withTitle('Unit Kerja');
	}

	/**
	 * Show the form for creating a new unitkerja
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('unitkerjas.create')->withTitle('Tambah Unit Kerja');
	}

	/**
	 * Store a newly created unitkerja in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Unitkerja::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$unitkerja = Unitkerja::create($data);

		return Redirect::route('admin.unitkerja.index')->with("successMessage", "Berhasil menyimpan $unitkerja->nama ");
	}

	/**
	 * Display the specified unitkerja.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$unitkerja = Unitkerja::findOrFail($id);

		return View::make('unitkerjas.show', compact('unitkerja'));
	}

	/**
	 * Show the form for editing the specified unitkerja.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$unitkerja = Unitkerja::find($id);

		return View::make('unitkerjas.edit', ['unitkerja'=>$unitkerja])->withTitle("Ubah $unitkerja->nama");
	}

	/**
	 * Update the specified unitkerja in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$unitkerja = Unitkerja::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Unitkerja::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$unitkerja->update($data);

		return Redirect::route('admin.unitkerja.index')->with("successMessage", "Berhasil menyimpan $unitkerja->nama");
	}

	/**
	 * Remove the specified unitkerja from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Unitkerja::destroy($id);

		return Redirect::route('admin.unitkerja.index')->with("successMessage","Unit kerja berhasil dihapus. ");
	}

}
