<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTujabsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tujabs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('tujab');
			$table->integer('unitkerja_id')->unsigned();
			$table->integer('jabatan_id')->unsigned();
			$table->integer('unit_id')->unsigned();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tujabs');
	}

}
