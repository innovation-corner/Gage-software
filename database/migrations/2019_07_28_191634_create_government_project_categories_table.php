<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGovernmentProjectCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('government_project_categories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 200);
			$table->integer('parent_category_id')->unsigned()->nullable()->index('parent_category_id');
			$table->bigInteger('created_by')->unsigned()->nullable()->index('created_by');
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
		Schema::drop('government_project_categories');
	}

}
