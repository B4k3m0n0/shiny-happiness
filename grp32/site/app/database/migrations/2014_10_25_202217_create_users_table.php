<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->string('username')->unique()->lenght(20);
			$table->string('password');
			$table->string('fullname')->lenght(80);
			$table->string('email')->unique();
			$table->bigInteger('creditcard')->lenght(16);
			$table->date('birthdate');
			$table->string('country');
			$table->string('picture')->nullable();
			$table->string('address')->nullable();
			$table->integer('phone')->nullable();
			$table->string('facebook')->nullable();
			$table->string('twitter')->nullable();
			$table->boolean('admin')->default(false);
			$keys = array('id', 'username', 'email');
			$table->string('remember_token')->nullable()->lenght(100);
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
		Schema::drop('users');
	}

}
