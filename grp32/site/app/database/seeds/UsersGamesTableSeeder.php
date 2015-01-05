<?php


class UsersGamesTableSeeder extends Seeder {

	public function run()
	{

		
		for ($i=1; $i <= 100; $i++) { 
			$score = rand(5,375);	

			UsersGame::insert(array(
				'game_id' 		=> $i,
				'user' 			=> 'user'.$i,
				'score' 		=> $score
				));
		}

	}

}