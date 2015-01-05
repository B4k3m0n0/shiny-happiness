<?php


class SettingsTableSeeder extends Seeder {

	public function run()
	{

		for ($i=1; $i <= 100; $i++) { 

			Setting::insert(array(
				'diceImageName' => 'defaultDiceImage.png',
				'diceImage' => 'img/settingsPictures/defaultDiceImage.png'
				));
		}
	}

}