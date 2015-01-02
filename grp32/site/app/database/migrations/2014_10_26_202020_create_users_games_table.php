<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersGamesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_games', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('game_id')->unsigned();
			$table->foreign('game_id')->references('id')->on('games');
			$table->string('user');
			$table->foreign('user')->references('username')->on('users');
			$table->integer('score')->unsigned();
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
		Schema::drop('users_games');
	}

}
