<?php

class GameController extends BaseController {

	/**
	 * game Repository
	 *
	 * @var game
	 */
	protected $scoreBoardVals;
	protected $diceLauncher;

	public function __construct(YahtzeeCombinationCalculator $scoreBoardVals, DiceLauncher $diceLauncher)
	{
		$this->scoreBoardVals = $scoreBoardVals;
		$this->diceLauncher = $diceLauncher;
	}

	/*NOT USED*/
	public function getGames()
	{
		return Response::json(Game::all());
	}

	public function create()
	{
		$createGame = array(
			'game_name' => Input::get('gameName'),
			'game_owner' => Auth::user()->username,
			'status' => "Waiting",
			'num_bots' => Input::get('botsDefined'),
			'num_players' => Input::get('totalPlayersDefined')-Input::get('botsDefined')
			);

		$gameCreated = Game::create($createGame);
		/*$username = Auth::user()->username;*/
/*
		UsersGame::create(array('gameId' => $gameId, 'user' => $username));
*/
		return $gameCreated;
	}

	public function update()
	{
		$updateGame = array(
			'num_bots' => Input::get('botsDefined'),
			'num_players' => Input::get('totalPlayersDefined')-Input::get('botsDefined')
			);

		Game::where('id', Input::get('id'))->update($updateGame);

		$gameUpdated = Game::where('id', Input::get('id'))->first();

		return $gameUpdated;
	}

	public function join()
	{

	}

	public function start()
	{
		/*ASSOCIATION BETWEEN GAME AND USERS*/
		$players = Input::get('players');
		$gameId = Input::get('id');
		$playersString = '';
		for ($i=0; $i < sizeof($players); $i++) { 
			$playersString .= $players[$i].';';
			$gameAssociation = array(
				'game_id' => $gameId,
				'user' => $players[$i]
				);
			UsersGame::create($gameAssociation);
		}

		/*UPDATE GAME*/
		$updateGame = array(
			'status' => "Started"
			);

		Game::where('id', $gameId)->update($updateGame);
		

		/*CREATE A PLAY FOR THE GAME*/
		$gamePlay = array(
			'game_id' => $gameId,
			'player_sequence' => $playersString,
			'current_player' => $players[0]
			);

		Play::create($gamePlay);
	}


	public function index($id) {
		$game = Game::find($id);

		if (Session::get('bonus') == null && Session::get('bonus') == null) {
			Session::put('bonus', true);
			Session::put('totalScore', true);
		}

		$scoreBoardBonus = array(
			'Aces',
			'Twos',
			'Threes',
			'Fours',
			'Fives',
			'Sixes',
			'Sum',
			'Bonus',
			'Three of a Kind',
			'Four of a Kind',
			'Full House',
			'Small Straight',
			'Large Straight',
			'Chance',
			'YAHTZEE',
			'TOTAL SCORE'
			);

		$scoreBoardRules = array(
			'Get as many ones as possible.',
			'Get as many twos as possible.',
			'Get as many threes as possible.',
			'Get as many fours as possible.',
			'Get as many fives as possible.',
			'Get as many sixes as possible.',
			'Sum of all the points above.',
			'35 bonus points will be awarded if the Sum has more than 63 points.',
			'Get three dice with the same number. Points are the sum of all dice.',
			'Get four dice with the same number. Points are the sum of all dice.',
			'Get three of a kind and a pair, e.g. 1,1,3,3,3 or 3,3,3,6,6. Scores 25 points.',
			'Get four sequential dice, 1,2,3,4 or 2,3,4,5 or 3,4,5,6. Scores 30 points.',
			'Get five sequential dice, 1,2,3,4,5 or 2,3,4,5,6. Scores 40 points.',
			'Get any combination. Points are the sum of all dice.',
			'Five of a kind. Scores 50 points.',
			'Sum of all the points.'
			);

		$scoreBoard = array($scoreBoardBonus, $scoreBoardRules);

		$playStatus = Play::where('game_id', $id)->first();

		return View::make('projeto/game', array(
			'id' => $id,
			'currentPlayer' => $playStatus->current_player,
			'playerSequence' => $playStatus->player_sequence,
			'numberRolls' => $playStatus->rolls,
			'diceValues' => $playStatus->dice_value,
			'diceSaved' => $playStatus->dice_saved,
			'scores' => $playStatus->score_id,
			'scoreBoard' => $scoreBoard
			));
	}

	public function generateDice()
	{
		$id = Input::get('id');
		$currentPlay = Play::where('game_id', $id)->first();
		/*VER ESTE IF*/
		/*if (Auth::user()->username == $currentPlay->current_player) {*/
			$numberGot = Input::get('numberGot');
			$diceSelected = Input::get('diceSelected');
			$diceGenerated = $this->diceLauncher->generateDice($numberGot);
			$boardResult = $this->scoreBoardVals->getScore($this->diceLauncher->getDice());

			if (Session::get('rolls') == null) {
				Session::put('rolls', 1);
			}else{
				Session::put('rolls', Session::get('rolls')+1);
			}

			Session::put('actualScoreBoard', $boardResult);

			$diceSelectedString = '';
			$diceGeneratedString = '';

			for ($i=0; $i < sizeof($diceSelected); $i++) {
				if (sizeof($diceSelected)-1 != $i) {
					$diceSelectedString .= $diceSelected[$i].',';
				}else{
					$diceSelectedString .= $diceSelected[$i];
				}
			}

			for ($i=0; $i < sizeof($diceGenerated); $i++) {
				if (sizeof($diceGenerated)-1 != $i) {
					$diceGeneratedString .= $diceGenerated[$i].',';
				}else{
					$diceGeneratedString .= $diceGenerated[$i];
				}
			}

			$updatePlay = array(
				'dice_value' => $currentPlay->dice_value.$diceGeneratedString.";",
				'dice_saved' => $currentPlay->dice_saved.$diceSelectedString.";"
				);

			Play::where('game_id', $id)->update($updatePlay);

			return Response::json(array('diceGenerated' => $diceGenerated, 'boardResult' => $boardResult));
			/*}*/
		}

		public function currentPlay()
		{
			$id = Input::get('id');
			$currentPlay = Play::where('game_id', $id)->first();
			$scoreSelected = Input::get('scoreType');

			if (Auth::user()->username == $currentPlay->current_player) {
				$numRolls = Input::get('numRolls');
				$listPlayers = explode(';', $currentPlay->player_sequence);
				$indexCurrentPlayer = array_search($currentPlay->current_player , $listPlayers);

				if ($indexCurrentPlayer == sizeof($listPlayers)-2) {
					$currentPlayer = $listPlayers[0];
					Debugbar::info("last to first");
				}else{
					$currentPlayer = $listPlayers[$indexCurrentPlayer+1];
					Debugbar::info("seguinte");
				}

				$newPlay = array(
					'rolls' => $currentPlay->rolls.$numRolls.";",
					'score_id' => $currentPlay->score_id.$scoreSelected.":".Session::get('actualScoreBoard')[$scoreSelected].";",
					'current_player' => $currentPlayer
					);

				Play::where('game_id', $id)->update($newPlay);


				/*SPECIALS CALCULATION*/
				$players = explode(";", $currentPlay->player_sequence);
				$player = $currentPlay->current_player;
				$currentPlay = Play::where('game_id', $id)->first();
				$scores = explode(";", $currentPlay->score_id);

				Debugbar::info($scores);

				for ($i=0; $i < sizeof($scores); $i++) { 
					if (strpos($scores[$i], '6:') !== false || strpos($scores[$i], '7:') !== false || strpos($scores[$i], '15:') !== false){
						unset($scores[$i]);
					}
				}
				$scores = array_values($scores);


				/*NEW*/

				$bonusBoardValue = 0;

				$userIndex = array_search($player, $players);
				$usersSize = count($players)-1;
				$aux = 1;

				for ($i=0; $i < sizeof($scores); $i++) {
					if (strpos($scores[$i], '6:') !== false) {
						if ($userIndex == $aux) {
							$scoreBonus = explode(":", $scores[$i+1]);
							array_push($bonusBoardValue, $scoreBonus[1]);
						}
					}

					if ($aux == $usersSize+1) {
						$aux = 1;
					}else{
						$aux++;
					}
				}

				/*END*/

				Debugbar::info($scores);

				$playerPos = array_search($player, $players);
				$playersSize = sizeof($players)-1;
				$scoresSize = sizeof($scores)-1;

				Debugbar::info($playerPos);
				Debugbar::info($scoresSize);

				$helper = array();

				for ($i=0; $i < $scoresSize/$playersSize; $i++) {
					array_push($helper, $scores[$playerPos+$playersSize*$i]);
				}

				Debugbar::info($helper);
				
				$normalBoardKey = array();
				$normalBoardValues = array();
				$normalBoardAssocia = array();
				for ($i=0; $i < sizeof($helper); $i++) { 
					$aux = explode(":", $helper[$i]);
					array_push($normalBoardKey, $aux[0]);
					array_push($normalBoardValues, $aux[1]);
					$normalBoardAssocia[$normalBoardKey[$i]] = $normalBoardValues[$i];
				}

				$sum = null;
				$bonus = null;
				if (in_array(0, $normalBoardKey) && in_array(1, $normalBoardKey) && in_array(2, $normalBoardKey) && in_array(3, $normalBoardKey) && in_array(4, $normalBoardKey) && in_array(5, $normalBoardKey) && Session::get('bonus')) {
					for ($i=0; $i < 6; $i++) { 
						$sum += $normalBoardAssocia[$i];
					}
					if ($sum >= 63) {
						$bonus = 35;
					}else{
						$bonus = 0;
					}

					$aux = array(
						'score_id' => Play::where('game_id', $id)->first()->score_id."6:".$sum.";7:".$bonus.";");

					Session::put('bonus', false);
					Play::where('game_id', $id)->update($aux);
				}

				$totalScore = null;
				if (in_array(0, $normalBoardKey) && in_array(1, $normalBoardKey) && in_array(2, $normalBoardKey) && in_array(3, $normalBoardKey) && in_array(4, $normalBoardKey) && in_array(5, $normalBoardKey) && in_array(8, $normalBoardKey) && in_array(9, $normalBoardKey) && in_array(10, $normalBoardKey) && in_array(11, $normalBoardKey) && in_array(12, $normalBoardKey) && in_array(13, $normalBoardKey) &&in_array(14, $normalBoardKey) && Session::get('totalScore')) {
					for ($i=0; $i < 13; $i++) { 
						$totalScore += $normalBoardValues[$i];
					}
					$totalScore += $bonusBoardValue;

					$aux = array(
						'score_id' => Play::where('game_id', $id)->first()->score_id."15:".$totalScore.";");

					Session::put('totalScore', false);
					Play::where('game_id', $id)->update($aux);
				}

				$haveFinished = 0;
				$winner = 0;
				$indexAux = 0;
				$winnerIndex = -1;
				$scoreList = array();
				foreach ($scores as $score) {
					if (strpos($score, '15:')) {
						$haveFinished ++;
						$newScore = substr($score, strpos($score, ":") + 1);
						array_push($scoreList, $newScore);
						if ($winner < $newScore) {
							$winner = $newScore;
							$winnerIndex = $haveFinished;
							Debugbar::info('Winner->'.$winnerIndex);
						}
					}
				}

				if (sizeof($listPlayers)-1 == $haveFinished && $winnerIndex != -1) {
					$aux = array(
						'status' => 'Finished',
						'winner' => $listPlayers[$winnerIndex]);
					Game::where('id', $id)->update($aux);
					Debugbar::info("to data base");
					for ($i=0; $i < $haveFinished; $i++) {
						$myScore = array('score' => $scoreList[$i]);
						UsersGame::where('game_id', $id)->where('user', $listPlayers[$i])->update($myScore);
					}
				}


				/*END SPECIALS CALCULATION*/



				return Response::json(array('currentPlayer' => $currentPlayer, 'sum' => $sum, 'bonus' => $bonus, 'totalScore' => $totalScore));
			}
		}

		public function getBoard()
		{
			return Response::json(array('board' => $this->scoreBoardVals->getScore(Input::get('dice')), 'rolls' => Session::get('rolls')));
		}
	}