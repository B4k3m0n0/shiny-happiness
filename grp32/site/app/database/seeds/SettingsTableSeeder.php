<?php


class SettingsTableSeeder extends Seeder {

	public function run()
	{
DB::table('settings')->delete();

		for ($i=1; $i <= 10; $i++) { 

			Setting::insert(array(
				'diceImageName' => 'defaultDiceImage.png',
				'diceImage' => 'img/settingsPictures/defaultDiceImage.png'
				));
		}
	}

}