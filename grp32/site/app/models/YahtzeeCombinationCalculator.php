<?php

class YahtzeeCombinationCalculator {

	public function getScore($dices)
	{
		$score = array_merge(array(), $this->getUpperScore($dices));
		array_push($score, null, null, $this->get3ofKindScore($dices), $this->get4ofKindScore($dices), $this->getFullHouseScore($dices), $this->getSmallStraightScore($dices), $this->getLargeStraightScore($dices), $this->getChanceScore($dices), $this->getYahtzeeScore($dices), null);

		return $score;
	}

/*
	public function getSum()
	{
		return null;
	}

	public function getBonus()
	{
		return null;
	}

	public function getTotalScore()
	{
		return null;
	}
*/
	public function getUpperScore($dices)
	{
		$counter = array_count_values($dices);
		$result = array();

		for ($i=1; $i <= 6; $i++) { 
			if (!array_key_exists($i, $counter)) {
				$counter[$i] = null;
			}
		}

		ksort($counter);

		foreach ($counter as $key => $value) {
			if ($value != null) {
				array_push($result, $key*$value);
			}else{
				array_push($result, 0);
			}
		}

		return $result;
	}

	public function get3ofKindScore($dices)
	{
		$value = 0;
		$dicesCounted = $this->hasDuplicates($dices);

		foreach ($dicesCounted as $diceCount)
		{
			if ($diceCount >= 3) {
				foreach ($dices as $dice) {
					$value += $dice;
				}
				return $value;
			}
		}
		return 0;
	}

	public function get4ofKindScore($dices)
	{
		$value = 0;
		$dicesCounted = $this->hasDuplicates($dices);

		foreach ($dicesCounted as $diceCount)
		{
			if ($diceCount >= 4) 
			{
				foreach ($dices as $dice) 
				{
					$value += $dice;
				}
				return $value;
			}
		}
		return 0;
	}

	public function getFullHouseScore($dices)
	{
		$dicesCounted = $this->hasDuplicates($dices);

		foreach ($dicesCounted as $diceCount)
		{
			if ($diceCount == 3) 
			{
				foreach ($dicesCounted as $diceCount) 
				{
					if ($diceCount == 2) {
						return 25;
					}
				}
			}
		}
		return 0;
	}

	public function getSmallStraightScore($dices)
	{
		sort($dices);
		$singleDices = array_values(array_unique($dices));
		$sizeDice = sizeof($singleDices);
		$count = 0;
		$firstDice = $singleDices[0];

		for ($i=0; $i < $sizeDice; $i++)
		{
			if ($singleDices[$i] == $firstDice+$count) {
				$count++;
			} else {
				$count = 0;
				$firstDice = $singleDices[$i];
				$i--;
			}

			if ($count >= 4) {
				return 30;
			}
		}
		return 0;
	}

	public function getLargeStraightScore($dices)
	{
		sort($dices);
		$singleDices = array_values(array_unique($dices));
		$sizeDice = sizeof($singleDices);
		$count = 0;
		$firstDice = $singleDices[0];

		for ($i=0; $i < $sizeDice; $i++)
		{
			if ($singleDices[$i] == $firstDice+$count) {
				$count++;
			} else {
				$count = 0;
				$firstDice = $singleDices[$i];
				$i--;
			}
			
			if ($count >= 5) {
				return 40;
			}
		}
		return 0;
	}

	public function getChanceScore($dices)
	{
		$count = 0;

		foreach ($dices as $dice)
		{
			$count += $dice;
		}

		return $count;
	}

	public function getYahtzeeScore($dices)
	{
		$dicesCounted = $this->hasDuplicates($dices);

		foreach ($dicesCounted as $diceCount)
		{
			if ($diceCount == 5) {
				return 50;
			}
		}
		return 0;
	}

	public function hasDuplicates($dices)
	{
		return array_count_values($dices);
	}
}