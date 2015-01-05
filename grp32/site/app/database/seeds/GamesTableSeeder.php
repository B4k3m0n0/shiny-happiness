<?php



class GamesTableSeeder extends Seeder {

	public function run()
	{


		for ($i=1; $i <= 10; $i++) { 

			Game::insert(array(
				'game_name' => 'game'.$i,
				'game_owner' => 'user'.$i,
				'status' => 'Started',
				'num_bots' => 9,
				'num_players' => 1,
				'winner' => 'user'.$i,
				));
		}



		for ($i=11; $i <= 20; $i++) { 

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