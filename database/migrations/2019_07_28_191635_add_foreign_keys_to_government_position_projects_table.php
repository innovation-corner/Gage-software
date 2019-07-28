<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToGovernmentPositionProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('government_position_projects', function(Blueprint $table)
		{
			$table->foreign('government_position_id', 'government_position_projects_ibfk_1')->references('id')->on('government_positions')->onUpdate('CASCADE')->onDelete('NO ACTION');
			$table->foreign('inserted_by', 'government_position_projects_ibfk_2')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('NO ACTION');
			$table->foreign('government_project_category_id', 'government_position_projects_ibfk_3')->references('id')->on('government_project_categories')->onUpdate('CASCADE')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('government_position_projects', function(Blueprint $table)
		{
			$table->dropForeign('government_position_projects_ibfk_1');
			$table->dropForeign('government_position_projects_ibfk_2');
			$table->dropForeign('government_position_projects_ibfk_3');
		});
	}

}
