<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToGovernmentPolicyCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('government_policy_categories', function(Blueprint $table)
		{
			$table->foreign('created_by', 'government_policy_categories_ibfk_1')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('government_policy_categories', function(Blueprint $table)
		{
			$table->dropForeign('government_policy_categories_ibfk_1');
		});
	}

}
