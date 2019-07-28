<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGovernmentStaffOfficesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('government_staff_offices', function(Blueprint $table)
		{
			$table->increments('id');
			$table->bigInteger('government_staff_id')->unsigned()->index('government_staff_id');
			$table->integer('government_position_id')->unsigned()->index('government_position_id');
			$table->smallInteger('year')->unsigned();
			$table->bigInteger('created_by')->unsigned()->index('created_by');
			$table->timestamps();
			$table->dateTime('deleted_at');
			$table->unique(['government_staff_id','government_position_id','year'], 'government_staff_uniqueness');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('government_staff_offices');
	}

}
