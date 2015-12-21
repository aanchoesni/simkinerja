<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class JabatansTableSeeder extends Seeder {

	public function run()
	{
		//kosongkan database
		DB::table('jabatans')->delete();

		//buat array untuk input
		$jabatans = [
			['id'=>'1', 'nama'=>'kepala', 'created_at'=>'2015-02-25 21:55:59', 'updated_at'=>'2015-02-25 21:55:59'],
			['id'=>'2', 'nama'=>'sekretaris', 'created_at'=>'2015-02-25 21:55:59', 'updated_at'=>'2015-02-25 21:55:59'],
		];

		//insert data ke database
		DB::table('jabatans')->insert($jabatans);
	}

}