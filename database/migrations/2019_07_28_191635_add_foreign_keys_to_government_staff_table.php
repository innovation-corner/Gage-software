<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToGovernmentStaffTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('government_staff', function(Blueprint $table)
		{
			$table->foreign('created_by', 'government_staff_ibfk_1')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('NO ACTION');
			$table->foreign('government_id', 'government_staff_ibfk_2')->references('id')->on('governments')->onUpdate('CASCADE')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('government_staff', function(Blueprint $table)
		{
			$table->dropForeign('government_staff_ibfk_1');
			$table->dropForeign('government_staff_ibfk_2');
		});
	}

}
