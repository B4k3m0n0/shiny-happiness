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
		$dices = array(1,1,2,3,4);

		$yahtzeeCombinationCalculator = new YahtzeeCombinationCalculator();

		$results = $yahtzeeCombinationCalculator->getAcesScore($dices);

		$this->assertEquals($results, $value);
	}

	public function testGetTwosScore()
	{
		$value = 2;
		$dices = array(1,1,2,3,4);

		$yahtzeeCombinationCalculator = new YahtzeeCombinationCalculator();

		$results = $yahtzeeCombinationCalculator->getTwosScore($dices);

		$this->assertEquals($results, $value);
	}

	public function testGetThreesScore()
	{
		$value = 6;
		$dices = array(1,1,3,3,4);

		$yahtzeeCombinationCalculator = new YahtzeeCombinationCalculator();

		$results = $yahtzeeCombinationCalculator->getThreesScore($dices);

		$this->assertEquals($results, $value);
	}

	public function testGetFoursScore()
	{
		$value = 12;
		$dices = array(1,1,4,4,4);

		$yahtzeeCombinationCalculator = new YahtzeeCombinationCalculator();

		$results = $yahtzeeCombinationCalculator->getFoursScore($dices);

		$this->assertEquals($results, $value);
	}

	public function testGetFivesScore()
	{
		$value = 5;
		$dices = array(1,5,2,3,4);

		$yahtzeeCombinationCalculator = new YahtzeeCombinationCalculator();

		$results = $yahtzeeCombinationCalculator->getFivesScore($dices);

		$this->assertEquals($results, $value);
	}

	public function testGetSixesScore()
	{
		$value = 12;
		$dices = array(1,6,2,6,4);

		$yahtzeeCombinationCalculator = new YahtzeeCombinationCalculator();

		$results = $yahtzeeCombinationCalculator->getSixesScore($dices);

		$this->assertEquals($results, $value);
	}

	public function testGet3ofKindScore()
	{
		$value = 11;
		$dices = array(1,2,2,2,4);

		$yahtzeeCombinationCalculator = new YahtzeeCombinationCalculator();

		$results = $yahtzeeCombinationCalculator->get3ofKindScore($dices);

		$this->assertEquals($results, $value);
	}

	public function testGet4ofKindScore()
	{
		$value = 21;
		$dices = array(5,4,4,4,4);

		$yahtzeeCombinationCalculator = new YahtzeeCombinationCalculator();

		$results = $yahtzeeCombinationCalculator->get4ofKindScore($dices);

		$this->assertEquals($results, $value);
	}

	public function testGetFullHouseScore()
	{
		$value = 25;
		$dices = array(1,1,3,3,3);

		$yahtzeeCombinationCalculator = new YahtzeeCombinationCalculator();

		$results = $yahtzeeCombinationCalculator->getFullHouseScore($dices);

		$this->assertEquals($results, $value);
	}

	public function testGetSmallStraightScore()
	{
		$value = 30;
		$dices = array(1,3,2,5,4);

		$yahtzeeCombinationCalculator = new YahtzeeCombinationCalculator();

		$results = $yahtzeeCombinationCalculator->getSmallStraightScore($dices);

		$this->assertEquals($results, $value);
	}

	public function testGetLargeStraightScore()
	{
		$value = 40;
		$dices = array(1,3,2,5,4);

		$yahtzeeCombinationCalculator = new YahtzeeCombinationCalculator();

		$results = $yahtzeeCombinationCalculator->getLargeStraightScore($dices);

		$this->assertEquals($results, $value);
	}

	public function testGetChanceScore()
	{
		$value = 11;
		$dices = array(1,1,2,3,4);

		$yahtzeeCombinationCalculator = new YahtzeeCombinationCalculator();

		$results = $yahtzeeCombinationCalculator->getChanceScore($dices);

		$this->assertEquals($results, $value);
	}

	public function testGetYahtzeeScore()
	{
		$value = 50;
		$dices = array(5,5,5,5,5);

		$yahtzeeCombinationCalculator = new YahtzeeCombinationCalculator();

		$results = $yahtzeeCombinationCalculator->getYahtzeeScore($dices);

		$this->assertEquals($results, $value);
	}

}