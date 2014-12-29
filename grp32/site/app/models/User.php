<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {



	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';


	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password'/*, 'remember_token'*/);


	/*Remover*/
	protected $fillable = array('username', 'password', 'fullname', 'email', 'creditcard', 'birthdate', 'country', 'picture', 'address', 'phone', 'facebook', 'twitter');

	

	public static $rules = array(
		'username'       => 'required|unique:users|alpha_num',
		'password'       => 'required|min:8',
		'fullname'       => 'required|alpha_spaces|min:5|max:80',
		'email'			 => 'required|unique:users|email',
		'creditcard' 	 => 'required|digits:11',
		'birthdate'		 => 'required|date',
		'country'		 => 'required|alpha',
		'picture' 		 => 'image',
		'address' 		 => 'alpha',
		'phone' 		 => 'numeric',
		'facebook'		 => 'alpha',
		'twitter' 		 => 'alpha'
		);

	public static $rulesEdit = array(
		'password'       => 'required|min:8',
		'fullname'       => 'required|alpha_spaces|min:5|max:80',
		'email'			 => 'email',
		'creditcard' 	 => 'required|digits:11',
		'birthdate'		 => 'required|date',
		'country'		 => 'required|alpha',
		'picture' 		 => 'image',
		'address' 		 => 'alpha',
		'phone' 		 => 'numeric',
		'facebook'		 => 'alpha',
		'twitter' 		 => 'alpha'
		);


}
