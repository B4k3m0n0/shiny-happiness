<?php

class LobbyController extends BaseController {

	public function index()
	{

		$games = Game::where('status', '<>', 'ended')->take(8)->get();
		return View::make('lobby')->with('games', $games);
		

	}


	public function showScores(){
		//create fake data on database
		//Game::truncate();
		Game::insert(array('game_name' => 'jogo1', 'game_owner' => 'joao','status' => 'Waiting','num_bots' => '7', 'num_players' => '2','winner' => 'joao'));
		//UsersGame::truncate();
		UsersGame::insert(array('game_id' => '1', 'user' => 'joao','score' => '100'));
		UsersGame::insert(array('game_id' => '1', 'user' => 'fdfdhgfhgf','score' => '200'));
		UsersGame::insert(array('game_id' => '1', 'user' => 'dfsdfsdfdsf1','score' => '300'));
		UsersGame::insert(array('game_id' => '2', 'user' => 'dfsdfsdfdsf1','score' => '400'));
		UsersGame::insert(array('game_id' => '2', 'user' => 'coiso','score' => '500'));
		UsersGame::insert(array('game_id' => '2', 'user' => 'fdfdhgfhgf','score' => '600'));
		UsersGame::insert(array('game_id' => '2', 'user' => 'coiso123','score' => '700'));
		UsersGame::insert(array('game_id' => '4', 'user' => 'Mateussadsdf','score' => '800'));
		UsersGame::insert(array('game_id' => '4', 'user' => 'joao','score' => '900'));
		UsersGame::insert(array('game_id' => '6', 'user' => 'coiso123','score' => '1000'));
		UsersGame::insert(array('game_id' => '6', 'user' => 'Mateussadsdf','score' => '1100'));
		UsersGame::insert(array('game_id' => '4', 'user' => 'joao','score' => '1200'));



		$scores = UsersGame::orderBy('score', 'desc')
		->take(10)
		->get();
		Debugbar::info($scores);




		//get only the first part of the date (yyyy-mm-dd)
		$data = array();
		foreach ($scores as $score)
		{
			$date = explode(' ', $score->created_at);
			array_push($data,$date[0]);	
		}			

		$gameNames = array();

		for ($i=0; $i < 10; $i++) { 
			//Debugbar::info($scores[$i]->id);
			$game = Game::where('id',$scores[$i]->game_id)
			->first();
			array_push($gameNames, $game->game_name);
		}

		//$games = Game::where('status', '<>', 'ended')->take(8)->get();
		return View::make('scores',array(
			'scores'=> $scores,
			'gameNames' => $gameNames,
			'data' => $data));	
	}

	public function showUsersList(){

		$bannedUsersSearch = Ban::get();
		$bannedUsers = '';
		foreach ($bannedUsersSearch as $bannedUser) {
			$bannedUsers = $bannedUsers.','.$bannedUser->banned_user;
		}
		//$bannedUsers = substr($bannedUsers, 1);
		Debugbar::info("ssssss".$bannedUsers);


		$allUsers = User::orderBy('username','asc')->get();//->paginate(20);
		$users = '';
		
		foreach ($allUsers as $user) {
			$users = $users.','.$user->username;
			//array_push($users, $user->username);
		}
		$users = substr($users, 1);

		Debugbar::info($users);
		return View::make('usersList')->with('users',$users)->with('bannedUsers',$bannedUsers);
	}


}