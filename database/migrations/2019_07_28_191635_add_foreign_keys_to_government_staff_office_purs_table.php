<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToGovernmentStaffOfficePursTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('government_staff_office_purs', function(Blueprint $table)
		{
			$table->foreign('government_staff_office_id', 'government_staff_office_purs_ibfk_1')->references('id')->on('government_staff_offices')->onUpdate('CASCADE')->onDelete('NO ACTION');
			$table->foreign('pur_user_id', 'government_staff_office_purs_ibfk_2')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('NO ACTION');
			$table->foreign('rating_id', 'government_staff_office_purs_ibfk_3')->references('id')->on('ratings')->onUpdate('CASCADE')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('government_staff_office_purs', function(Blueprint $table)
		{
			$table->dropForeign('government_staff_office_purs_ibfk_1');
			$table->dropForeign('government_staff_office_purs_ibfk_2');
			$table->dropForeign('government_staff_office_purs_ibfk_3');
		});
	}

}
