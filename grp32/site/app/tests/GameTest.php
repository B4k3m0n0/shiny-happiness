<?php

class GameTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */

	public function testGetAcesScore()
	{
		$value = 2;
		$dices = array(
			"dice1" => 1,
			"dice2" => 1,
			"dice3" => 2,
			"dice4" => 3,
			"dice5" => 4
		);

		$yahtzeeCombinationCalculator = new YahtzeeCombinationCalculator();

		$results = $yahtzeeCombinationCalculator->getAcesScore($dices);

		$this->assertEquals($results, $value);
	}

	public function testGetTwosScore()
	{
		$value = 2;
		$dices = array(
			"dice1" => 1,
			"dice2" => 1,
			"dice3" => 2,
			"dice4" => 3,
			"dice5" => 4
		);

		$yahtzeeCombinationCalculator = new YahtzeeCombinationCalculator();

		$results = $yahtzeeCombinationCalculator->getTwosScore($dices);

		$this->assertEquals($results, $value);
	}

	public function testGetThreesScore()
	{
		$value = 6;
		$dices = array(
			"dice1" => 1,
			"dice2" => 1,
			"dice3" => 3,
			"dice4" => 3,
			"dice5" => 4
		);

		$yahtzeeCombinationCalculator = new YahtzeeCombinationCalculator();

		$results = $yahtzeeCombinationCalculator->getThreesScore($dices);

		$this->assertEquals($results, $value);
	}

	public function testGetFoursScore()
	{
		$value = 12;
		$dices = array(
			"dice1" => 1,
			"dice2" => 1,
			"dice3" => 4,
			"dice4" => 4,
			"dice5" => 4
		);

		$yahtzeeCombinationCalculator = new YahtzeeCombinationCalculator();

		$results = $yahtzeeCombinationCalculator->getFoursScore($dices);

		$this->assertEquals($results, $value);
	}

	public function testGetFivesScore()
	{
		$value = 5;
		$dices = array(
			"dice1" => 1,
			"dice2" => 5,
			"dice3" => 2,
			"dice4" => 3,
			"dice5" => 4
		);

		$yahtzeeCombinationCalculator = new YahtzeeCombinationCalculator();

		$results = $yahtzeeCombinationCalculator->getFivesScore($dices);

		$this->assertEquals($results, $value);
	}

	public function testGetSixesScore()
	{
		$value = 12;
		$dices = array(
			"dice1" => 1,
			"dice2" => 6,
			"dice3" => 2,
			"dice4" => 6,
			"dice5" => 4
		);

		$yahtzeeCombinationCalculator = new YahtzeeCombinationCalculator();

		$results = $yahtzeeCombinationCalculator->getSixesScore($dices);

		$this->assertEquals($results, $value);
	}

	public function testGet3ofKindScore()
	{
		$value = 11;
		$dices = array(
			"dice1" => 1,
			"dice2" => 2,
			"dice3" => 2,
			"dice4" => 2,
			"dice5" => 4
		);

		$yahtzeeCombinationCalculator = new YahtzeeCombinationCalculator();

		$results = $yahtzeeCombinationCalculator->get3ofKindScore($dices);

		$this->assertEquals($results, $value);
	}

	public function testGet4ofKindScore()
	{
		$value = 21;
		$dices = array(
			"dice1" => 5,
			"dice2" => 4,
			"dice3" => 4,
			"dice4" => 4,
			"dice5" => 4
		);

		$yahtzeeCombinationCalculator = new YahtzeeCombinationCalculator();

		$results = $yahtzeeCombinationCalculator->get4ofKindScore($dices);

		$this->assertEquals($results, $value);
	}

	public function testGetFullHouseScore()
	{
		$value = 25;
		$dices = array(
			"dice1" => 1,
			"dice2" => 1,
			"dice3" => 3,
			"dice4" => 3,
			"dice5" => 3
		);

		$yahtzeeCombinationCalculator = new YahtzeeCombinationCalculator();

		$results = $yahtzeeCombinationCalculator->getFullHouseScore($dices);

		$this->assertEquals($results, $value);
	}

	public function testGetSmallStraightScore()
	{
		$value = 30;
		$dices = array(
			"dice1" => 1,
			"dice2" => 3,
			"dice3" => 2,
			"dice4" => 5,
			"dice5" => 4
		);

		$yahtzeeCombinationCalculator = new YahtzeeCombinationCalculator();

		$results = $yahtzeeCombinationCalculator->getSmallStraightScore($dices);

		$this->assertEquals($results, $value);
	}

	public function testGetLargeStraightScore()
	{
		$value = 40;
		$dices = array(
			"dice1" => 1,
			"dice2" => 3,
			"dice3" => 2,
			"dice4" => 5,
			"dice5" => 4
		);

		$yahtzeeCombinationCalculator = new YahtzeeCombinationCalculator();

		$results = $yahtzeeCombinationCalculator->getLargeStraightScore($dices);

		$this->assertEquals($results, $value);
	}

	public function testGetChanceScore()
	{
		$value = 11;
		$dices = array(
			"dice1" => 1,
			"dice2" => 1,
			"dice3" => 2,
			"dice4" => 3,
			"dice5" => 4
		);

		$yahtzeeCombinationCalculator = new YahtzeeCombinationCalculator();

		$results = $yahtzeeCombinationCalculator->getChanceScore($dices);

		$this->assertEquals($results, $value);
	}

	public function testGetYahtzeeScore()
	{
		$value = 50;
		$dices = array(
			"dice1" => 5,
			"dice2" => 5,
			"dice3" => 5,
			"dice4" => 5,
			"dice5" => 5
		);

		$yahtzeeCombinationCalculator = new YahtzeeCombinationCalculator();

		$results = $yahtzeeCombinationCalculator->getYahtzeeScore($dices);

		$this->assertEquals($results, $value);
	}

}