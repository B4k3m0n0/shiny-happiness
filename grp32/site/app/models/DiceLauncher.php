<?php

class DiceLauncher {

	public function randomDices()
	{
		$randDices = array();
		for ($i=0; $i < 5; $i++) {
			$rand = rand(1, 6);
			array_push($randDices, $rand);
		}

		return $randDices;
	}
}
