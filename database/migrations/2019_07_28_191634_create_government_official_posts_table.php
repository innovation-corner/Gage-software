<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGovernmentOfficialPostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('government_official_posts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('header')->nullable();
			$table->text('content');
			$table->string('title')->unique('title');
			$table->bigInteger('posted_by')->unsigned()->index('posted_by');
			$table->integer('government_id')->unsigned()->index('government_id');
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
		Schema::drop('government_official_posts');
	}

}
