<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGovernmentPositionProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('government_position_projects', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('government_position_id')->unsigned()->index('government_position_id');
			$table->string('project_name')->nullable();
			$table->integer('government_project_category_id')->unsigned()->nullable()->index('government_project_category_id');
			$table->string('project_header')->nullable();
			$table->text('project_description_content')->nullable();
			$table->text('image_urls')->nullable();
			$table->bigInteger('inserted_by')->unsigned()->index('inserted_by');
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
		Schema::drop('government_position_projects');
	}

}
