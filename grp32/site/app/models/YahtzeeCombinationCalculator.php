<?php

class YahtzeeCombinationCalculator extends Eloquent {

	public function getAcesScore($dices)
	{
		$count = 0;
		$multiplier = 1;
		foreach ($dices as $dice)
		{
			if ($dice == 1) {
				$count++;
			}
		}
		if ($count*$multiplier == 0) {
			return null;
		}
		return $count*$multiplier;
	}

	public function getTwosScore($dices)
	{
		$count = 0;
		$multiplier = 2;
		foreach ($dices as $dice)
		{
			if ($dice == 2) {
				$count++;
			}
		}
		if ($count*$multiplier == 0) {
			return null;
		}
		return $count*$multiplier;

	}

	public function getThreesScore($dices)
	{
		$count = 0;
		$multiplier = 3;
		foreach ($dices as $dice)
		{
			if ($dice == 3) {
				$count++;
			}
		}
		if ($count*$multiplier == 0) {
			return null;
		}
		return $count*$multiplier;
	}

	public function getFoursScore($dices)
	{
		$count = 0;
		$multiplier = 4;
		foreach ($dices as $dice)
		{
			if ($dice == 4) {
				$count++;
			}
		}
		if ($count*$multiplier == 0) {
			return null;
		}
		return $count*$multiplier;
	}

	public function getFivesScore($dices)
	{
		$count = 0;
		$multiplier = 5;
		foreach ($dices as $dice)
		{
			if ($dice == 5) {
				$count++;
			}
		}
		if ($count*$multiplier == 0) {
			return null;
		}
		return $count*$multiplier;
	}

	public function getSixesScore($dices)
	{
		$count = 0;
		$multiplier = 6;
		foreach ($dices as $dice)
		{
			if ($dice == 6) {
				$count++;
			}
		}
		if ($count*$multiplier == 0) {
			return null;
		}
		return $count*$multiplier;
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
			if ($singleDices[$i] == $firstDice+$i) {
				$count++;
			} elseif ($count == 0) {
				$firstDice = $singleDices[$i];
			}
		}

		if ($count >= 4) {
			return 30;
		}
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
			if ($singleDices[$i] == $firstDice+$i) {
				$count++;
			} elseif ($count == 0) {
				$firstDice = $singleDices[$i];
			}
		}

		if ($count >= 5) {
			return 40;
		}
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
	}

	public function hasDuplicates($dices)
	{
		return array_count_values($dices);
	}
}