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
			$table->string('game_name');
			$table->string('game_owner');
			$table->foreign('game_owner')->references('username')->on('users');
			$table->string('status');
			$table->integer('num_bots')->lenght(1);
			$table->integer('num_players')->lenght(2);
			$table->string('winner')->nullable();
			$table->foreign('winner')->references('username')->on('users');
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
