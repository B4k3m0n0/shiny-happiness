<?php



class BansTableSeeder extends Seeder {

	public function run()
	{
		

		for ($i=10; $i <= 100; $i++) { 

			Ban::insert(array(
				'banned_user' => 'user'.$i
				));
		}
	}

}