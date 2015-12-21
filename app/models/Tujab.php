<?php

class Tujab extends BaseModel {

	// Add your validation rules here
	public static $rules = [
		//'tujab' => 'required|unique:tujabs,tujab,:id',
		'unitkerja_id' => 'required|exists:unitkerjas,id',
		'unit_id' => 'required|exists:units,id',
		'jabatan_id' => 'required|exists:jabatans,id'
	];

	// Don't forget to fill this array
	protected $fillable = ['tujab','unitkerja_id','unit_id','jabatan_id'];

	public function unitkerja()
	{
		return $this->belongsTo('Unitkerja','unit_kerja','id');
	}

	public function unit()
	{
		return $this->belongsTo('Unit');
	}
	public function jabatan()
	{
		return $this->belongsTo('Jabatan');
	}

	public function users()
	{
		return $this->belongsToMany('User')->withPivot('validation')->withTimestamps();
	}
	public function kerja()
	{
		return $this->belongsTo('Kerja');
	}
}