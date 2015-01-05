<?php



class ClearDatabaseSeeder extends Seeder {

	public function run()
	{

		        

		DB::table('plays')->delete();
		DB::table('users_games')->delete();
		DB::table('games')->delete();
		DB::table('bans')->delete();
		DB::table('settings')->delete();
		DB::table('users')->delete();
	}

}