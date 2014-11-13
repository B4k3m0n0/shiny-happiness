<?php

class UserController extends BaseController {


	public function index()
	{
		return View::make('outside/login');
	}


	public function login()
	{
		$user = User::where('username', '=', Input::get('username'))->first();
		$loginInput = array(
			'username' => Input::get('username'),
			'password' => Input::get('password')
			);

		if (Auth::attempt($loginInput))
		{
			return View::make('projeto.dashboard')->with('username', Input::get('username'));
    		/*return Redirect::intended('dashboard');*/
		}
		else
		{
			return Redirect::to('login');
		}
	}

	public function signup() {
		$signup = array(
			'username' => Input::get('username'),
			'password' => Hash::make(Input::get('password')),
			'fullname' => Input::get('fullname'),
			'email' => Input::get('email'),
			'creditcard' => Input::get('creditcard'),
			'birthdate' => Input::get('birthdate'),
			'country' => Input::get('country'),
			'picture' => Input::get('picture'),
			'address' => Input::get('address'),
			'phone' => Input::get('phone'),
			'facebook' => Input::get('facebook'),
			'twitter' => Input::get('twitter')
			);

		User::create($signup);
		return Redirect::to('login');
	}
}
