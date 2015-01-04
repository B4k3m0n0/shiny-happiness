<?php

class AdminController extends BaseController {


	public function index()
	{
		//
	}


	public function showSettings()
	{
		if (Auth::check() && Auth::user()->admin == 1) {

			$diceImage = Setting::orderBy('id', 'desc')->first();
			Debugbar::info($diceImage);

			return View::make('admin/settings')->with('diceImage',$diceImage);
		}
		return Redirect::to('lobby');
	}


	public function editSettings()
	{		
	//Setting::insert(array('diceImageName' => 'image1.png', 'diceImage' => 'image1.png'));

		if (Input::hasFile('diceImage')) {
			$imageSize = getimagesize(Input::file('diceImage'));
			$width = $imageSize[0];
			$height = $imageSize[1];
			
			/*if ($width != 50 || $height != 50) {
				$messageSizeError = 'The image must be 50px by 50px';
				return Redirect::to('settings')->with('messageSizeError',$messageSizeError);
			}*/

			$numImages = Setting::get()->count();
			Debugbar::info('Numero imagens: '.$numImages);
			if ($numImages == 0) {
				$numImages = 1;
			}else{
				$numImages = $numImages+1;
			}

			$mimetype = Input::file('diceImage')->getClientOriginalExtension();
			Debugbar::info('Mimetype: '.$mimetype);
			$mime = Input::file('diceImage')->getMimeType();
			Debugbar::info('Mime: '.$mime);		
			$file            = Input::file('diceImage');			
			Debugbar::info('File: '.$file);	
			$destinationPath = public_path().'/img/settingsPictures/';
			Debugbar::info('Destination Path: '.$destinationPath);	
			$filename        = $numImages.'.'. $mimetype;
			Debugbar::info('Filename: '.$filename);			
			$uploadSuccess   = $file->move($destinationPath, $filename);
			Debugbar::info('Upload Success: '.$uploadSuccess);	
			if($uploadSuccess){
				$activePicture = 'img/settingsPictures/'.$filename; 
				Debugbar::info('Upload Succeeded!' .$activePicture );	

				$image = array('diceImageName' => $filename,
					'diceImage' => $activePicture);

				$messageSuccessful = 'Image successfully updated!';
				Setting::create($image);
				return Redirect::to('settings')->with('messageSuccessful',$messageSuccessful);
			}
		}
		$messageSuccessful = 'Image successfully updated!';		
		return Redirect::to('settings')->with('messageSuccessful',$messageSuccessful);
	}

	public function toggleBanUser()
	{		
		
		if (Auth::check() && Auth::user()->admin == 1) {
			$username = Input::get('username');
			//Debugbar::info("Estou no ban user".$username);

			$bannedUsersSearch = Ban::get();
			$users = array();
			foreach ($bannedUsersSearch as $bannedUser ) {
				array_push($users,$bannedUser->banned_user);

			}
			Debugbar::info($users);

			//Debugbar::info("LISTA USERS BANIDOS ".$users);


			if (in_array($username, $users)) {
				$unbannedUser = Ban::where('banned_user', $username)->delete();
				Debugbar::info("The user ".$unbannedUser." has been unbanned");
			}else{
				$bannedUser = Ban::insert(array('banned_user' => $username));
				Debugbar::info("The user ".$bannedUser." has been banned");
				

			}
		}
	}
}
