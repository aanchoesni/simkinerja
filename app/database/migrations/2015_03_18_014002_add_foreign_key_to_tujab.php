<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeyToTujab extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('tujabs', function(Blueprint $table)
		{
			$table->foreign('unitkerja_id')->references('id')->on('unitkerjas')
			->onDelete('restrict')	
			->onUpdate('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tujabs', function(Blueprint $table)
		{
			$table->dropForeign('tujabs_unitkerja_id_foreign');
		});
	}

}
