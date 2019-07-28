<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToGovernmentStatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('government_states', function(Blueprint $table)
		{
			$table->foreign('government_id', 'government_states_ibfk_1')->references('id')->on('governments')->onUpdate('CASCADE')->onDelete('NO ACTION');
			$table->foreign('created_by', 'government_states_ibfk_2')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('government_states', function(Blueprint $table)
		{
			$table->dropForeign('government_states_ibfk_1');
			$table->dropForeign('government_states_ibfk_2');
		});
	}

}
