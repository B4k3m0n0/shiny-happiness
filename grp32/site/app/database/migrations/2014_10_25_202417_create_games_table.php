<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('games', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->string('username1');
			$table->foreign('username1')->references('username')->on('users');
			$table->string('username2');
			$table->foreign('username2')->references('username')->on('users');
			$table->string('username3');
			$table->foreign('username3')->references('username')->on('users');
			$table->string('username4');
			$table->foreign('username4')->references('username')->on('users');
			$table->string('username5');
			$table->foreign('username5')->references('username')->on('users');
			$table->string('username6');
			$table->foreign('username6')->references('username')->on('users');
			$table->string('username7');
			$table->foreign('username7')->references('username')->on('users');
			$table->string('username8');
			$table->foreign('username8')->references('username')->on('users');
			$table->string('username9');
			$table->foreign('username9')->references('username')->on('users');
			$table->string('username10');
			$table->foreign('username10')->references('username')->on('users');
			$table->integer('num_players')->lenght(2);
			$table->string('winner');
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
		Schema::drop('games');
	}

}
