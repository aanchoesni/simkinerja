<?php

class Karyawan extends BaseModel {

	protected $table = 'users'; //mengambil nama tabel yang tidak sama dengan nama model
	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
		'first_name' => 'required',
		'email' => 'required|email|unique:users,email,:id',
		'password' => 'confirmed|required|min:5',
		'unit_kerja' => 'required|exists:unitkerjas,id',
		'unit' => 'required|exists:units,id',
		'jabatan' => 'required|exists:jabatans,id'
	];

	// Don't forget to fill this array
	protected $fillable = ['first_name', 'last_name', 'nip', 'unit_kerja','unit','jabatan','email','password'];

	public function namaunitkerja()
	{
		$namaunitkerja=$this->/*nama function relasi*/unitkerja()->first();
		return $namaunitkerja->nama/*field yang diambil*/;
	}

	public function unitkerja()
	{
		return $this->belongsTo('Unitkerja','unit_kerja','id');
	}
	public function namaunit()
	{
		$namaunit=$this->unit()->first();
		return $namaunit->nama;
	}

	public function unit()
	{
		return $this->belongsTo('Unit','unit','id');
	}

	public function namajabatan()
	{
		$namajabatan=$this->jabatan()->first();
		return $namajabatan->nama;
	}

	public function jabatan()
	{
		return $this->belongsTo('jabatan','jabatan','id');
	}

	public function group()
	{
		return $this->belongsTo('Group');
	}

	public function kinerja()
	{
		return $this->hasMany('Kinerja','user_id','id');
	}

	public function tujab_user()
	{
		return $this->hasMany('kerja','user_id','id');
	}
}