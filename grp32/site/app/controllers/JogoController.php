<?php

class JogoController extends BaseController {

	/**
	 * jogo Repository
	 *
	 * @var jogo
	 */
	protected $jogo;

	public function __construct(YahtzeeCombinationCalculator $jogo, DiceLauncher $diceLauncher)
	{
		$this->jogo = $jogo;
		$this->diceLauncher = $diceLauncher;
	}

	public function getJogo()
	{
		$dices = Input::all();

		array_shift($dices);

		$jogos = $this->jogoCall($dices);

		return View::make('projeto/game')->with('jogos', $jogos);
	}

	public function jogoCall($dices)
	{
		$jogoPontos = $this->jogo->getScore($dices);

		$jogoBonus = array(
			'Aces',
			'Twos',
			'Threes',
			'Fours',
			'Fives',
			'Sixes',
			'Three of a Kind',
			'Four of a Kind',
			'Full House',
			'Small Straight',
			'Large Straight',
			'Chance',
			'YAHTZEE'
		);

		$jogoRules = array(
			'Get as many ones as possible.',
			'Get as many twos as possible.',
			'Get as many threes as possible.',
			'Get as many fours as possible.',
			'Get as many fives as possible.',
			'Get as many sixes as possible.',
			'Get three dice with the same number. Points are the sum of all dice.',
			'Get four dice with the same number. Points are the sum of all dice.',
			'Get four sequential dice, 1,2,3,4 or 2,3,4,5 or 3,4,5,6. Scores 43 points.',
			'Get three of a kind and a pair, e.g. 1,1,3,3,3 or 3,3,3,6,6. Scores 25 points.',
			'Get any combination. Points are the sum of all dice.',
			'Get five sequential dice, 1,2,3,4,5 or 2,3,4,5,6. Scores 40 points.',
			'Five of a kind. Scores 50 points.'
		);

		$jogos = array($jogoBonus, $jogoPontos, $jogoRules);

		return $jogos;
	}

	public function randomDices()
	{
		return Response::json($this->diceLauncher->randomDices());
	}

}
