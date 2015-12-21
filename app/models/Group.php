<?php

class Group extends BaseModel {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'

	];

	// Don't forget to fill this array
	public function karyawan()
	{
		return $this->hasMany('Karyawan');
	}
}