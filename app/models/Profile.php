<?php

class Profile extends BaseModel {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
		'first_name' => 'required',
		'unit_kerja' => 'required|exists:unitkerjas,id',
		'unit' => 'required|exists:units,id',
		'jabatan' => 'required|exists:jabatans,id'
	];

	// Don't forget to fill this array
	protected $fillable = ['first_name', 'last_name', 'nip', 'unit_kerja','unit','jabatan'];

	public function unitkerja()
	{
		return $this->belongTo('Unitkerja');
	}

	public function unit()
	{
		return $this->belongTo('Unit');
	}
	public function jabatan()
	{
		return $this->belongTo('Jabatan');
	}

}