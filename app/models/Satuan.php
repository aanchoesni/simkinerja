<?php

class Satuan extends BaseModel {

	// Add your validation rules here
	public static $rules = [
		'satuan' => 'required|unique:satuans,satuan,:id'
	];

	// Don't forget to fill this array
	protected $fillable = ['satuan'];

	public function tujab()
	{
		return $this->hasMany('Tujab');
	}

}