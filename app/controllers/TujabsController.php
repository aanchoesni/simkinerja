<?php

class TujabsController extends \BaseController {

	/**
	 * Display a listing of tujabs
	 *
	 * @return Response
	 */
	public function index()
	{
		$tujabs = DB::table('viewtujab')->get();		
		$tujabs = 
		[
			'tujabs' => $tujabs
		];		
		return View::make('tujabs.index', $tujabs)->withTitle('Tugas Jabatan');
	}

	/**
	 * Show the form for creating a new tujab
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('tujabs.create')->withTitle('Tambah Tugas Jabatan');
	}

	/**
	 * Store a newly created tujab in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Tujab::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$tujab = Tujab::create($data);

		return Redirect::route('admin.tujab.index')->with("successMessage", "Berhasil menyimpan $tujab->tujab ");
	}

	/**
	 * Display the specified tujab.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$tujab = Tujab::findOrFail($id);

		return View::make('tujabs.show', compact('tujab'));
	}

	/**
	 * Show the form for editing the specified tujab.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tujab = Tujab::find($id);

		return View::make('tujabs.edit', ['tujab'=>$tujab])->withTitle("Ubah");
	}

	/**
	 * Update the specified tujab in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$tujab = Tujab::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Tujab::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$tujab->update($data);

		return Redirect::route('admin.tujab.index')->with("successMessage", "Berhasil menyimpan $tujab->tujab. ");
	}

	/**
	 * Remove the specified tujab from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Tujab::destroy($id);

		return Redirect::route('admin.tujab.index')->with('successMessage','Tujab berhasil dihapus. ');
	}

	public function perunit()
	{
		$unitper = Input::get('unit_id');
		$jabatan = Input::get('jabatan_id');
		$tujabis = DB::table('viewtujab')->orderBy('jabatan','ASC')->where('unit',$unitper)->where('jabatan',$jabatan)->get();		
		$tujabis = 
		[
			'tujabs' => $tujabis
		];		
		return View::make('tujabs.index', $tujabis)->withTitle("Tugas Jabatan $unitper sebagai $jabatan");
	}

}
