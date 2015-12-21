<?php

class SatuansController extends \BaseController {

	/**
	 * Display a listing of satuans
	 *
	 * @return Response
	 */
	public function index()
	{
		$satuans = DB::table('satuans')->get();
		$satuans = 
		[
			'satuans' => $satuans
		];
		return View::make('satuans.index', $satuans)->withTitle('Satuan');
	}

	/**
	 * Show the form for creating a new satuan
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('satuans.create')->withTitle('Tambah Satuan');
	}

	/**
	 * Store a newly created satuan in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Satuan::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		} 

		$satuan = Satuan::create($data);
		
		return Redirect::route('admin.satuan.index')->with("successMessage", "Berhasil menyimpan $satuan->satuan ");
	}

	/**
	 * Display the specified satuan.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$satuan = Satuan::findOrFail($id);

		return View::make('satuans.show', compact('satuan'));
	}

	/**
	 * Show the form for editing the specified satuan.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$satuan = Satuan::find($id);

		return View::make('satuans.edit', ['satuan'=>$satuan])->withTitle("Ubah $satuan->nama");
	}

	/**
	 * Update the specified satuan in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$satuan = Satuan::findOrFail($id);

		$validator = Validator::make($data = Input::all(), $satuan->updateRules());

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$satuan->update($data);

		return Redirect::route('admin.satuan.index')->with("successMessage", "Berhasil menyimpan $satuan->nama ");
	}

	/**
	 * Remove the specified satuan from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Satuan::destroy($id);

		return Redirect::route('admin.satuan.index')->withTitle('successMessage','Satuan berhasil dihapus.');
	}

}
