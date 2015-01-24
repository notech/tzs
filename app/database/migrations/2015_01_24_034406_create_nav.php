<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNav extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('nav');
		Schema::create('nav', function(Blueprint $table)
		{
			$table->increments('id');//自增唯一ID
			$table->string('title')->index();
			$table->string('url');
			$table->string('parent_id');
			$table->string('type');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('nav');
	}

}
