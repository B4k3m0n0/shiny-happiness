<?php



class PlaysTableSeeder extends Seeder {

	public function run()
	{


		for ($i=1; $i <= 10; $i++) { 
			$rolls = array();
			for ($i=0; $i < 10; $i++) { 
				array_push($rolls, $i);
			}

			
			$dice1 = rand(1,6);
			$dice2 = rand(1,6);
			$dice3 = rand(1,6);
			$dice4 = rand(1,6);
			$dice5 = rand(1,6);
			$dice6 = rand(1,6);

			$left = rand(0,15);
			$right = rand(1,50);



			Play::insert(array(
				'game_id'			 => $i,
				'player_sequence' 	 => 'user'.$i.';'.'user'.$i+1,	
				'current_player'	 => 'user'.$i,
				'rolls' 			 => $rolls[0].';'.$rolls[1].';'.$rolls[2].';'.$rolls[3].';'.$rolls[4].';'.$rolls[5].';'.$rolls[6].';'.$rolls[7].';'.$rolls[8].';'.$rolls[9],
				'dice_value' 		 => $dice1.','.$dice2.','.$dice3.','.$dice4.','.$dice5.';'.$dice2.','.$dice3.','.$dice4.','.$dice5.','.$dice6.';'.$dice3.','.$dice4.','.$dice5.','.$dice6.','.$dice3.';'.$dice4.','.$dice5.','.$dice6.','.$dice1.','.$dice2,
				'dice_saved' 		 => $dice1.','.$dice2.','.$dice3.';;'.$dice4.','.$dice2.','.$dice1,
				'score_id' 			 => $left.':'.$right.';'.$left.':'.$right.';'.$left.':'.$right				
				));
		}
	}

}