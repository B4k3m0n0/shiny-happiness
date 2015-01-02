<?php

class LobbyController extends BaseController {

	public function index()
	{

		$games = Game::where('status', '<>', 'ended')->take(8)->get();
		return View::make('lobby')->with('games', $games);
		

	}


	public function showScores(){
		//create fake data on database
		//UsersGame::delete();
		/*UsersGame::insert(array('gameId' => '1', 'user' => 'Mateus'));
		UsersGame::insert(array('gameId' => '1', 'user' => 'asdsad'));
		UsersGame::insert(array('gameId' => '1', 'user' => 'aaaaaaaa'));
		UsersGame::insert(array('gameId' => '2', 'user' => 'joao'));
		UsersGame::insert(array('gameId' => '2', 'user' => 'coiso'));
		UsersGame::insert(array('gameId' => '2', 'user' => 'coiso1'));
		UsersGame::insert(array('gameId' => '2', 'user' => 'jonny15'));
		UsersGame::insert(array('gameId' => '4', 'user' => 'Mateus'));
		UsersGame::insert(array('gameId' => '4', 'user' => 'joao'));
		UsersGame::insert(array('gameId' => '6', 'user' => 'jonny15'));
		UsersGame::insert(array('gameId' => '6', 'user' => 'Mateus'));
		UsersGame::insert(array('gameId' => '4', 'user' => 'joao'));*/



		$scores = UsersGame::orderBy('id', 'desc')//TODO mudar id para os pontos obtidos no jogo
		->take(10)
		->get();




		//get only the first part of the date (yyyy-mm-dd)
		$data = array();
		foreach ($scores as $score)
		{
			$date = explode(' ', $score->created_at);
			array_push($data,$date[0]);	
		}			
		Debugbar::info($data);




		
		$gameTitles = array();

		for ($i=0; $i < 10; $i++) { 
			//Debugbar::info($scores[$i]->id);
			$game = Game::where('id',$scores[$i]->gameId)
			->first();
			array_push($gameTitles, $game->title);
		}


		//Debugbar::info($gameTitles);
		//$users = UsersGame::get();
		/*foreach ($scores as $score)
		{
			var_dump($score->id .' ' . $score->user);
		}*/

		

		//$games = Game::where('status', '<>', 'ended')->take(8)->get();
		return View::make('scores',array(
			'scores'=> $scores,
			'gameTitles' => $gameTitles,
			'data' => $data));	
	}
}