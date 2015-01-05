<?php


class UsersTableSeeder extends Seeder {

	public function run()
	{
	/*ADMINS*/
		for ($i=1; $i <= 10; $i++) { 
		

			User::insert(array(
				'username' 		=> 'admin'.$i,
				'password' 		=> Hash::make('1234567890'),
				'fullname' 		=> 'The admin'.$i,
				'email'   		=> 'admin'.$i.'@yahtzee.com',
				'creditcard' 	=> '4916121916787087',
				'birthdate'		=> '1990-01-01',
				'country' 		=> 'Portugal',
				'picture' 		=> 'img/userPictures/defaultAdminPicture.png',
				'address'		=> 'Leiria',
				'phone'			=> '910000000',
				'facebook'		=> 'user'.$i,
				'twitter'		=> 'user'.$i,
				'admin'			=> '1'
				));
		}

		/*USERS*/

		for ($i=1; $i <= 100; $i++) { 

			User::insert(array(
				'username' 		=> 'user'.$i,
				'password' 		=> Hash::make('1234567890'),
				'fullname' 		=> 'The user'.$i,
				'email'   		=> 'user'.$i.'@yahtzee.com',
				'creditcard' 	=> '4916121916787087',
				'birthdate'		=> '1990-01-01',
				'country' 		=> 'Portugal',
				'picture' 		=> 'img/userPictures/defaultPicture.png',
				'address'		=> 'Leiria',
				'phone'			=> '910000000',
				'facebook'		=> 'user'.$i,
				'twitter'		=> 'user'.$i,
				'admin'			=> '0'
				));
		}


	}

}