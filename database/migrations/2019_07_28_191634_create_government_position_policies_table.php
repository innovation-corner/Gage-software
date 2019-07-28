<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGovernmentPositionPoliciesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('government_position_policies', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('government_position_id')->unsigned()->index('government_position_id');
			$table->string('policy_name')->nullable();
			$table->integer('government_policy_category_id')->unsigned()->index('government_policy_category_id');
			$table->integer('year')->unsigned();
			$table->string('policy_header')->nullable();
			$table->text('policy_description_content')->nullable();
			$table->text('image_urls')->nullable();
			$table->bigInteger('inserted_by')->unsigned()->index('inserted_by');
			$table->timestamps();
			$table->softDeletes();
			$table->unique(['policy_name','year'], 'policy_name');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('government_position_policies');
	}

}
