<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSongsMigrate extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('songs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('author');
			$table->string('title');
			$table->text('lyrics')->nullable();
			$table->string('slug')->unique();
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
		Schema::drop('songs');
	}

}
