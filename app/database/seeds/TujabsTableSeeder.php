<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TujabsTableSeeder extends Seeder {

	public function run()
	{
		//kosongkan database
		DB::table('tujabs')->delete();

		//buat array untuk input
		$tujabs = [
			['id'=>'1', 'tujab'=>'Menyusun data dan membuat laporan Penelitian', 'unitkerja_id'=>'1', 'unit_id'=>'1', 'jabatan_id'=>'2', 'created_at'=>'2015-02-25 21:55:59', 'updated_at'=>'2015-02-25 21:55:59'],
			['id'=>'2', 'tujab'=>'Mengetik surat tugas untuk peneliti', 'unitkerja_id'=>'1', 'unit_id'=>'1', 'jabatan_id'=>'2', 'created_at'=>'2015-02-25 21:55:59', 'updated_at'=>'2015-02-25 21:55:59'],
			['id'=>'3', 'tujab'=>'Mengetik data peneliti', 'unitkerja_id'=>'1', 'unit_id'=>'1', 'jabatan_id'=>'2', 'created_at'=>'2015-02-25 21:55:59', 'updated_at'=>'2015-02-25 21:55:59'],
			['id'=>'4', 'tujab'=>'Merekap data peneliti', 'unitkerja_id'=>'1', 'unit_id'=>'1', 'jabatan_id'=>'2', 'created_at'=>'2015-02-25 21:55:59', 'updated_at'=>'2015-02-25 21:55:59'],
			['id'=>'5', 'tujab'=>'Mengolah data peneliti dari bulan Januari s.d Juni', 'unitkerja_id'=>'1', 'unit_id'=>'1', 'jabatan_id'=>'2', 'created_at'=>'2015-02-25 21:55:59', 'updated_at'=>'2015-02-25 21:55:59'],
			['id'=>'6', 'tujab'=>'Menyiapkan berkas usulan peneliti', 'unitkerja_id'=>'1', 'unit_id'=>'1', 'jabatan_id'=>'2', 'created_at'=>'2015-02-25 21:55:59', 'updated_at'=>'2015-02-25 21:55:59'],
			['id'=>'7', 'tujab'=>'Menyiapkan berkas peneliti yang akan monev', 'unitkerja_id'=>'1', 'unit_id'=>'1', 'jabatan_id'=>'2', 'created_at'=>'2015-02-25 21:55:59', 'updated_at'=>'2015-02-25 21:55:59'],
			['id'=>'8', 'tujab'=>'Mengetik data peserta peneliti yang akan di unggah', 'unitkerja_id'=>'1', 'unit_id'=>'1', 'jabatan_id'=>'2', 'created_at'=>'2015-02-25 21:55:59', 'updated_at'=>'2015-02-25 21:55:59'],
			['id'=>'9', 'tujab'=>'Mengetik draft berita acara kontrak peneliti', 'unitkerja_id'=>'1', 'unit_id'=>'1', 'jabatan_id'=>'2', 'created_at'=>'2015-02-25 21:55:59', 'updated_at'=>'2015-02-25 21:55:59'],
			['id'=>'10', 'tujab'=>'Menyusun surat undangan peneliti', 'unitkerja_id'=>'1', 'unit_id'=>'1', 'jabatan_id'=>'2', 'created_at'=>'2015-02-25 21:55:59', 'updated_at'=>'2015-02-25 21:55:59'],
			['id'=>'11', 'tujab'=>'Memproses kontrak peneliti', 'unitkerja_id'=>'1', 'unit_id'=>'1', 'jabatan_id'=>'2', 'created_at'=>'2015-02-25 21:55:59', 'updated_at'=>'2015-02-25 21:55:59'],
		];

		//insert data ke database
		DB::table('tujabs')->insert($tujabs);
	}

}