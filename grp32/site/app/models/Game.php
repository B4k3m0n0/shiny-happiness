<?php

class Game extends Eloquent {

	protected $fillable = array('game_name', 'game_owner', 'status', 'num_bots', 'num_players', 'winner');

}