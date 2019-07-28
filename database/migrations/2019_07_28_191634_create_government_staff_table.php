<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGovernmentStaffTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('government_staff', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('name');
			$table->bigInteger('created_by')->unsigned()->index('created_by');
			$table->integer('government_id')->unsigned()->index('government_id');
			$table->string('email');
			$table->string('phone', 15);
			$table->boolean('gender')->nullable();
			$table->timestamps();
			$table->dateTime('deleted_at');
			$table->unique(['name','government_id'], 'name');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('government_staff');
	}

}
