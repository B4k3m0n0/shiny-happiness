<?php

class DiceLauncher {

	protected $diceGot;

	public function generateDice($numGot)
	{
		$generator = 5-sizeof($numGot);
		$randDices = array();

		for ($i=0; $i < $generator; $i++) {
			$rand = rand(1, 6);
			array_push($randDices, $rand);
		}

		$this->diceGot = array_merge($randDices, $numGot);

		return $randDices;
	}

	public function getDice()
	{
		return $this->diceGot;
	}
}
