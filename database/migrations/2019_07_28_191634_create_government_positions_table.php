<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGovernmentPositionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('government_positions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 200);
			$table->integer('government_category_id')->unsigned()->index('government_category_id');
			$table->bigInteger('created_by')->unsigned()->index('created_by');
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
		Schema::drop('government_positions');
	}

}
