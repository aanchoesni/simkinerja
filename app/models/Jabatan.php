<?php

class Jabatan extends BaseModel {

	// Add your validation rules here
	public static $rules = [
		'nama' => 'required|unique:jabatans,nama,:id'
	];

	// Don't forget to fill this array
	protected $fillable = ['nama'];

	public function tujab()
	{
		return $this->hasMany('Tujab');
	}
	public function karyawan()
	{
		return $this->hasMany('Karyawan');
	}

}