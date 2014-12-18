<?php

class GameController extends BaseController {

	/**
	 * game Repository
	 *
	 * @var game
	 */
	protected $game;

	public function __construct(Game $game)
	{
		$this->game = $game;
	}

	public function getGames()
	{
		return Response::json(Game::all());
	}
}
