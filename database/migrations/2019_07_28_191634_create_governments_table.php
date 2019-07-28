<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGovernmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('governments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 200)->unique('name');
			$table->integer('created_by')->unsigned()->nullable()->index('created_by');
			$table->integer('country_id')->unsigned()->nullable()->index('country_id');
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
		Schema::drop('governments');
	}

}
