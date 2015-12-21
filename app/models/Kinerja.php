<?php

class Kinerja extends BaseModel {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
		'tujab_id' => 'required|exists:tujabs,id',
		'satuan' => 'required',
		'qty' => 'required|numeric',
		'file' => 'mimes:zip,docx,rar,doc,xls,xlsx,pdf,png,jpg,jpeg|max:6144',

	];

	// Don't forget to fill this array
	protected $fillable = ['tujab_id','user_id','keterangan','qty','satuan','file','validation'];

}