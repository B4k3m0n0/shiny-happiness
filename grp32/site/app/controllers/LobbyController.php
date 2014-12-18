<?php

class LobbyController extends BaseController {

	public function index()
	{
		$games = Game::where('status', '<>', 'ended')->take(8)->get();
		return View::make('projeto.dashboard')->with('games', $games);
	}
}