<?php

class UnitsController extends \BaseController {

	/**
	 * Display a listing of units
	 *
	 * @return Response
	 */
	public function index()
	{
		$units = DB::table('units')->get();
		$units = 
		[
			'units' => $units
		];
		return View::make('units.index', $units)->withTitle('Sub Unit');
	}

	/**
	 * Show the form for creating a new unit
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('units.create')->withTitle('Tambah Sub Unit');
	}

	/**
	 * Store a newly created unit in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Unit::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		} 

		$unit = Unit::create($data);

		return Redirect::route('admin.unit.index')->with("successMessage", "Berhasil menyimpan $unit->nama ");
	}

	/**
	 * Display the specified unit.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$unit = Unit::findOrFail($id);

		return View::make('units.show', compact('unit'));
	}

	/**
	 * Show the form for editing the specified unit.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$unit = Unit::find($id);

		return View::make('units.edit', ['unit'=>$unit])->withTitle("Ubah $unit->nama");
	}

	/**
	 * Update the specified unit in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$unit = Unit::findOrFail($id);

		$validator = Validator::make($data = Input::all(), $unit->updateRules());

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$unit->update($data);

		return Redirect::route('admin.unit.index')->with("successMessage", "Berhasil menyimpan $unit->nama ");
	}

	/**
	 * Remove the specified unit from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Unit::destroy($id);

		return Redirect::route('admin.unit.index')->with("successMessage", "Unit berhasil dihapus. ");
	}

}
