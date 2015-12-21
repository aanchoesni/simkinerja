<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UnitsTableSeeder extends Seeder {

	public function run()
	{
		//kosongkan database
		DB::table('units')->delete();

		//buat array untuk input
		$jabatans = [
			['id'=>'1', 'nama'=>'Gugus Jaminan Mutu (GJM)', 'created_at'=>'2015-02-25 21:55:59', 'updated_at'=>'2015-02-25 21:55:59'],
			['id'=>'2', 'nama'=>'Jurnal & Hak Paten (JHP)', 'created_at'=>'2015-02-25 21:55:59', 'updated_at'=>'2015-02-25 21:55:59'],
		];

		//insert data ke database
		DB::table('units')->insert($jabatans);
	}

}