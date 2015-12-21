<?php

class Kerja extends BaseModel {

	protected $table = 'tujab_user';
	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
		'tujab_id' => 'required|exists:tujabs,id',
		'satuan' => 'required|numeric',
		'qty' => 'required',
		'file' => 'image|max:6144',

	];

	// Don't forget to fill this array
	protected $fillable = ['tujab_id','user_id','keterangan','qty','satuan','file','validation'];

	public function tujab()
	{
		return $this->belongsTo('Tujab','tujab_id','id');
	}

	public function namatujab()
	{
		$namatujab=$this->tujab()->first();
		return $namatujab->tujab;
	}

	public function karyawan()
	{
		return $this->belongsTo('karyawan','user_id','id');
	}

	public function namakaryawan()
	{
		$namakaryawan=$this->karyawan()->first();
		return $namakaryawan->first_name;
	}

	public function unit()
	{
		$unit=$this->karyawan->unit()->first();
		return $unit->nama;
	}
}