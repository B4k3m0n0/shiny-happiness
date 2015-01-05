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
		'username'      			  => 'required|unique:users|alpha_num',
		'password'      			  => 'required|min:8|confirmed',
		'password_confirmation'       => 'required|min:8',
		'fullname'      			  => 'required|alpha_spaces|min:5|max:80',
		'email'						  => 'required|unique:users|email',
		'creditcard' 				  => 'required|digits:16',
		'birthdate'					  => 'required|date',
		'country'					  => 'required|alpha',
		'picture'					  => 'image|mimes:jpeg,jpg,png,bmp',
		'address' 					  => 'alpha',
		'phone' 		 			  => 'numeric',
		'facebook'					  => 'alpha_num',
		'twitter' 					  => 'alpha_num'
		);

	public static $rulesEdit = array(
		'password'      			  => 'min:8|confirmed',
		'password_confirmation'       => 'min:8',
		'fullname'      			  => 'required|alpha_spaces|min:5|max:80',
		'email'						  => 'email',
		'creditcard' 				  => 'required|digits:16',
		'birthdate'					  => 'required|date',
		'country'					  => 'required|alpha',
		'picture'					  => 'image|mimes:jpeg,jpg,png,bmp',
		'address' 					  => 'alpha',
		'phone' 					  => 'numeric',
		'facebook'					  => 'alpha_num',
		'twitter' 					  => 'alpha_num'
		);

	public function getAge($date = 'now')
	{
		return intval(substr(date('Ymd') - date('Ymd', strtotime($date)), 0, -4));
	}


}
