<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGovernmentStatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('government_states', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 200);
			$table->bigInteger('created_by')->unsigned()->index('created_by');
			$table->integer('government_id')->unsigned()->index('government_id');
			$table->timestamps();
			$table->softDeletes();
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
		Schema::drop('government_states');
	}

}
