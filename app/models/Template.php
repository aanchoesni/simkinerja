<?php

class Template extends BaseModel {

	// Add your validation rules here
	public static $rules = [
		'file' => 'required',
		'nama' => 'required',
		'file' => 'mimes:zip,docx,rar,doc,xls,xlsx,pdf,png,jpg,jpeg|max:6144',
	];

	// Don't forget to fill this array
	protected $fillable = ['nama','file'];

}