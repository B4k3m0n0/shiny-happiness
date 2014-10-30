<?php

class ChatRoom extends Eloquent {
	
	protected $fillable = array('username', 'message');

	public static $rules = array(
		'message' => 'required'
	);
}
