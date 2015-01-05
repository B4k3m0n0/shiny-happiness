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


		$user = Input::all();

		Debugbar::info($user);
		/*if (Input::hasFile('picture')) {
			Debugbar::info('Tem picture');
		}else{
			Debugbar::info('Não tem picture');
		}*/


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

		

		//**Check date format and organize it for the database**//

		$dateParts = explode("-", Input::get('birthdate'));
		//Debugbar::info($dateParts);
		if (strlen($dateParts[2]) == 4) {
			$yearPart = $dateParts[2];
			$monthPart = $dateParts[1];
			$dayPart = $dateParts[0];
			//$b = $yearPart.'-'.$monthPart.'-'.$dayPart;
			//Debugbar::info($b.'   bbbbb');
			$userBirthdate = $yearPart.'-'.$monthPart.'-'.$dayPart;
			//Debugbar::info($signup['birthdate'].'olaaaaaa');
		}else{
			$userBirthdate = Input::get('birthdate');
		}
		//**End Check date format**//


		//**PICTURE**//
		if (Input::hasFile('picture')) {
			$mimetype = Input::file('picture')->getClientOriginalExtension();
			
			$mime 			 = Input::file('picture')->getMimeType();
			
			$file            = Input::file('picture');
			
			$destinationPath = public_path().'/img/userPictures/';
			
			$filename        = $user['username'] .'.'. $mimetype;
			
			$uploadSuccess   = $file->move($destinationPath, $filename);
			
			if($uploadSuccess){
				$user['picture']='img/userPictures/'.$filename; 
				
			}else{
				$user['picture']='img/userPictures/defaultPicture.png';  

			}
		}else{
			$user['picture']='img/userPictures/defaultPicture.png';  
			
		}
		//**END PICTURE**//


		$signup = array(
			'username' 		=> Input::get('username'),
			'password' 		=> Hash::make(Input::get('password')),
			'fullname' 		=> Input::get('fullname'),
			'email' 		=> Input::get('email'),
			'creditcard'	=> Input::get('creditcard'),
			'birthdate' 	=> $userBirthdate,
			'country' 		=> Input::get('country'),
			'picture' 		=> $user['picture'],
			'address' 		=> Input::get('address'),
			'phone' 		=> Input::get('phone'),
			'facebook' 		=> Input::get('facebook'),
			'twitter'		=> Input::get('twitter')
			);




		
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


			//$userPicture = User::where('username', $user['username'])->first()->picture;	
			//Debugbar::info('Picture path: '.$user['picture']);
			return View::make('profile/profile')->with('user',$user);
		}
		return Redirect::to('login');		
	}


	public function showOtherUserProfile($username)
	{

		if (Auth::check())
		{
			$user = User::where('username',$username)->first();

			return View::make('profile/otherUserProfile')->with('user',$user);
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

		Debugbar::info($user);

		//Debugbar::info('Tem picture');
		if (Input::hasFile('picture')) {
			Debugbar::info('Tem picture');
		}else{
			Debugbar::info('Não tem picture');
		}

	//	Debugbar::info('Extensão: '.Input::file('picture')->getClientOriginalExtension());


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

		//**PICTURE**//
		/*$userPicture = User::where('username', $user['username'])->first()->picture;	
		Debugbar::info('Picture: '.$userPicture);*/

		if (Input::hasFile('picture')) {
			$mimetype = Input::file('picture')->getClientOriginalExtension();
			Debugbar::info('Mimetype: '.$mimetype);
			$mime = Input::file('picture')->getMimeType();
			Debugbar::info('Mime: '.$mime);		
			$file            = Input::file('picture');
			Debugbar::info('File: '.$file);		

			$destinationPath = public_path().'/img/userPictures/';
			Debugbar::info('Destination Path: '.$destinationPath);	
			$filename        = $user['username'] .'.'. $mimetype;
			Debugbar::info('Filename: '.$filename);			
			$uploadSuccess   = $file->move($destinationPath, $filename);
			Debugbar::info('Upload Success: '.$uploadSuccess);	
			if($uploadSuccess){
				$userPicture = 'img/userPictures/'.$filename; 
				Debugbar::info('Upload Scceeded!' .$userPicture );
			}
		}else{
			$userPicture = User::where('username', $user['username'])->first()->picture;	
			Debugbar::info('No image selected '.$userPicture);	

		}
		//$userPicture = User::where('username', $user['username'])->first()->picture;	

		

		//**END PICTURE**//


		$edit = array(
			'password' => Hash::make(Input::get('password')),
			'fullname' => Input::get('fullname'),
			'email' => Input::get('email'),
			'creditcard' => Input::get('creditcard'),
			'birthdate' => Input::get('birthdate'),
			'country' => Input::get('country'),
			'picture' => $userPicture,
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
