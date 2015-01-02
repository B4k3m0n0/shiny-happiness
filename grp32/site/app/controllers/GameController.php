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
		/*if($game==null)
			return Redirect::route('lobby')->with(compact('Game does not exist!'));
		if($game->game_started == 2)
			return Redirect::route('board.index')->with(compact('Game already ended!'));
		*/

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

			Debugbar::info($playStatus->current_player);

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
				if (Auth::user()->username == $currentPlay->current_player) {
					$numRolls = Input::get('numRolls');
					$scoreSelected = Input::get('scoreType');
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
						'score_id' => $currentPlay->score_id.$scoreSelected.";",
						'current_player' => $currentPlayer
						);

					Play::where('game_id', $id)->update($newPlay);

					return Response::json(array('currentPlayer' => $currentPlayer));
				}
			}
		}
