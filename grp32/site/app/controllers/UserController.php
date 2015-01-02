<?php

class UserController extends BaseController {

	protected $userModel;
	public function __construct(User $userModel)
	{
		$this->userModel = $userModel;
	}

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
			return Redirect::to('lobby');
			/*return Redirect::intended('dashboard');*/
		}
		else
		{
			return Redirect::to('login');
		}
	}


	public function validateCreditCard($val) {
		$sum = 0;
		for ($i = 0; $i < $val.length; $i++) {
			$intVal = parseInt($val.substr($i, 1));
			if ($i % 2 == 0) {
				$intVal *= 2;
				if ($intVal > 9) {
					$intVal = 1 + ($intVal % 10);
				}
			}
			$sum += $intVal;
		}
		return ($sum % 10) == 0;
	}



	/*public function getAge($date = 'now')
	{
		return intval(substr(date('Ymd') - date('Ymd', strtotime($date)), 0, -4));
	}*/



	public function signup() {


		//var_dump(Input::file('picture'));
  		//Debugbar::info(Input::file('picture')->getFilename());

  		$file = Input::file('picture');


		$validCreditCard = false;
		Debugbar::info($validCreditCard);

		$validator = Validator::make(Input::all(), User::$rules);
		if ($validator->fails()) {
			$messages = $validator->messages();

			return Redirect::to('signup')
			->withInput()
			->withErrors($validator);
		}

		//**Validate Credit Card**//		
		$number=preg_replace('/\D/', '', Input::get('creditcard'));
		$number_length=strlen($number);
		$parity=$number_length % 2;

		$total=0;
		for ($i=0; $i<$number_length; $i++) {
			$digit=$number[$i];
			if ($i % 2 == $parity) {
				$digit*=2;
				if ($digit > 9) {
					$digit-=9;
				}
			}
			$total+=$digit;
		}
		if ($total % 10 == 0){
			$validCreditCard = true;
		} 
		if($validCreditCard == false){
			Debugbar::info('lalalala');
			return Redirect::to('signup')
			->withInput()
			->with('messageInvalidCC', 'Invalid Credit Card number');
		}
		//**End Validate Credit Card**//

		//Date validation
		$age = $this->userModel->getAge(Input::get('birthdate'));
		//Debugbar::info($age);
		if ($age < 18)
		{
			return Redirect::to('signup')
			->withInput()
			->with('messageInvalidAge', 'You must be 18 or older to register');
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

		//$a = $signup->birthdate;	
		Debugbar::info('$signup->birthdate');

		$dateParts = explode("-", Input::get('birthdate'));
		Debugbar::info($dateParts);

		if (strlen($dateParts[2]) == 4) {

			$yearPart = $dateParts[2];
			$monthPart = $dateParts[1];
			$dayPart = $dateParts[0];

			$b = $yearPart.'-'.$monthPart.'-'.$dayPart;
			Debugbar::info($b.'   bbbbb');
			$signup['birthdate'] = $yearPart.'-'.$monthPart.'-'.$dayPart;
			Debugbar::info($signup['birthdate'].'olaaaaaa');
		}

		
		User::create($signup);
		return Redirect::to('login');
	}

	public function signupView(){

		if (Auth::check())
		{
			return Redirect::to('lobby');
		}
		return View::make('outside/signup');
	}

	public function showProfile()
	{

		if (Auth::check())
		{
			$id = Auth::id();
			$user = User::find($id);

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

		//**Validate Credit Card**//		
		$number=preg_replace('/\D/', '', Input::get('creditcard'));
		$number_length=strlen($number);
		$parity=$number_length % 2;

		$total=0;
		for ($i=0; $i<$number_length; $i++) {
			$digit=$number[$i];
			if ($i % 2 == $parity) {
				$digit*=2;
				if ($digit > 9) {
					$digit-=9;
				}
			}
			$total+=$digit;
		}
		if ($total % 10 == 0){
			$validCreditCard = true;
		} 
		if($validCreditCard == false){
			Debugbar::info('lalalala');
			return Redirect::to('signup')
			->withInput()
			->with('messageInvalidCC', 'Invalid Credit Card number');
		}
		//**End Validate Credit Card**//

		//Date validation
		$age = $this->userModel->getAge(Input::get('birthdate'));
		//Debugbar::info($age);
		if ($age < 18)
		{
			return Redirect::to('profile')
			->withInput()
			->with('messageInvalidAge', 'You must be 18 or older to register');
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
