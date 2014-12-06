<?php

class GameLogic {
	$playersList = array();
	$activerPlayer;
	$numPlayers;

	$varA;

	public function nextPlayer()
	{
		if ($varA == $numPlayers) {
			$activerPlayer = reset($playersList);
			$varA = 1;
		}else{
			$activerPlayer = next($playersList);
			$varA ++;
		}
	}

	public function startGame ($players)
	{
		$playersList = $players;
		$numPlayers = count($playersList);
		$varA = $numPlayers;
	}

	public function diceGenerator ($chosenDice)
	{
		if ($chosenDice != null) {
			
		}else{

		}
	}
}