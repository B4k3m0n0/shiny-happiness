<?php

class Projeto extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'message' => 'required',
	);
}
