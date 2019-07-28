<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGovernmentStaffOfficePursTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('government_staff_office_purs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->bigInteger('pur_user_id')->unsigned()->index('pur_user_id');
			$table->integer('rating_id')->unsigned()->index('rating_id');
			$table->text('remark', 65535)->nullable();
			$table->integer('government_staff_office_id')->unsigned()->index('government_staff_office_id');
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('government_staff_office_purs');
	}

}
