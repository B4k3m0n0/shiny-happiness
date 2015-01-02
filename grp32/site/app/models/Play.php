<?php

class Play extends Eloquent {

	protected $fillable = array('game_id', 'player_sequence', 'current_player', 'rolls', 'dice_value', 'dice_saved_value', 'score_id');
}