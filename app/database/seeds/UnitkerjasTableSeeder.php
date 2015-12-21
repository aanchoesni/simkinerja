<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UnitkerjasTableSeeder extends Seeder {

	public function run()
	{
		//kosongkan database
		DB::table('unitkerjas')->delete();

		//buat array untuk input
		$unitkerjas = [
			['id'=>'1', 'nama'=>'LPPM', 'created_at'=>'2015-02-25 21:55:59', 'updated_at'=>'2015-02-25 21:55:59'],			
		];

		//insert data ke database
		DB::table('unitkerjas')->insert($unitkerjas);
	}

}