<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('plays', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('game_id')->unsigned();
			$table->foreign('game_id')->references('id')->on('games');
			$table->text('player_sequence');
			$table->string('current_player');
			$table->foreign('current_player')->references('username')->on('users');
			$table->text('rolls');
			$table->text('dice_value');
			$table->text('dice_saved');
			$table->text('score_id');
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
		Schema::drop('plays');
	}

}
