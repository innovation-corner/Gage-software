<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToGovernmentPositionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('government_positions', function(Blueprint $table)
		{
			$table->foreign('created_by', 'government_positions_ibfk_1')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('NO ACTION');
			$table->foreign('government_category_id', 'government_positions_ibfk_2')->references('id')->on('government_categories')->onUpdate('CASCADE')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('government_positions', function(Blueprint $table)
		{
			$table->dropForeign('government_positions_ibfk_1');
			$table->dropForeign('government_positions_ibfk_2');
		});
	}

}
