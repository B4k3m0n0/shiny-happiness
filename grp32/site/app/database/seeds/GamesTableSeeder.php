<?php



class GamesTableSeeder extends Seeder {

	public function run()
	{


		for ($i=1; $i <= 100; $i++) { 

			Game::insert(array(
				'game_name' => 'game'.$i,
				'game_owner' => 'user'.$i,
				'status' => 'Started',
				'num_bots' => 9,
				'num_players' => 1,
				'winner' => 'user'.$i,
				));
		}



		for ($i=101; $i <= 200; $i++) { 

			Game::insert(array(
				'game_name' => 'game'.$i,
				'game_owner' => 'user'.$i,
				'status' => 'Finished',
				'num_bots' => 5,
				'num_players' => 5,
				'winner' => 'user'.$i,
				));
		}

	}

}