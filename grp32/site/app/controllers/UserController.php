<?php

class UserController extends BaseController {


	public function index()
	{

		if (Auth::check())
		{
			return Redirect::to('lobby');
		}
		return View::make('outside/login');
	}


	public function login()
	{
		$loginInput = array(
			'username' => Input::get('username'),
			'password' => Input::get('password')
			);

		if (Auth::attempt($loginInput))
		{
			Session::put('username', Input::get('username'));
			return Redirect::to('lobby');
			/*return Redirect::intended('dashboard');*/
		}
		else
		{
			return Redirect::to('login');
		}
	}


	public function signup() {
		
		$validator = Validator::make(Input::all(), User::$rules);

		if ($validator->fails()) {
			$messages = $validator->messages();

			return Redirect::to('signup')
			->withInput()
			->withErrors($validator);
		}

		$signup = array(
			'username' 		=> Input::get('username'),
			'password' 		=> Hash::make(Input::get('password')),
			'fullname' 		=> Input::get('fullname'),
			'email' 		=> Input::get('email'),
			'creditcard'	=> Input::get('creditcard'),
			'birthdate' 	=> Input::get('birthdate'),
			'country' 		=> Input::get('country'),
			'picture' 		=> Input::get('picture'),
			'address' 		=> Input::get('address'),
			'phone' 		=> Input::get('phone'),
			'facebook' 		=> Input::get('facebook'),
			'twitter'		=> Input::get('twitter')
			);

		User::create($signup);
		return Redirect::to('login');


	}

	public function showProfile()
	{

		if (Auth::check())
		{
			$id = Auth::id();

			$user = User::find($id);
		//var_dump('olaaaaao '.$username);

			return View::make('profile')->with('user',$user);
		}
		return Redirect::to('login');		
	}


	public function logout(){



		Auth::logout(); 
		//Session::flush();

		return Redirect::to('login');

		
	}

	public function showLobby()
	{

		if (Auth::check())
		{
			$username = Auth::user()->username;

			return View::make('projeto.dashboard')->with('username', $username);
		}
		return Redirect::to('login');		
	}


	public function editProfile() {

		$user = Input::all();


//Debugbar::info($user);
//Debugbar::info($user['username']);

		$loggedUser = Auth::user()->username;
		$message = '';	





		$mail = User::where('email',$user['email'])->first();
		//Debugbar::info($mail);
		//Debugbar::info($mail->username != $loggedUser);

		if ( $mail != null) {
			if( $mail->username != $loggedUser)
			{
				$message = 'This email is already registered on the system.';
			}
		}

		$validator = Validator::make(Input::except('username'), User::$rulesEdit);

		if ($validator->fails()  || $message != '') {

			$messages = $validator->messages();

			return Redirect::to('profile')
			->withInput()
			->withErrors($validator)->with('message',$message);
		}


		$edit = array(
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


		//Debugbar::info($edit->creditcard);

		$messageSuccessful = 'Profile successfully updated!';
		User::where('username', $loggedUser)->update($edit);		
		return Redirect::to('profile')->with('messageSuccessful',$messageSuccessful);
	}


}
