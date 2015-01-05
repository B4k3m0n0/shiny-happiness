<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();



		$this->call('ClearDatabaseSeeder');
		$this->command->info('Database cleared!');

		DB::statement('SET FOREIGN_KEY_CHECKS=0;');

		$this->call('UsersTableSeeder');
		$this->command->info('User table seeded!');

		$this->call('SettingsTableSeeder');
		$this->command->info('Settings table seeded!');

		$this->call('BansTableSeeder');
		$this->command->info('Bans table seeded!');

		$this->call('GamesTableSeeder');
		$this->command->info('Games table seeded!');

		$this->call('UsersGamesTableSeeder');
		$this->command->info('Users Games table seeded!');

		$this->call('PlaysTableSeeder');
		$this->command->info('Plays  table seeded!');

			DB::statement('SET FOREIGN_KEY_CHECKS=1;');


	}

}


