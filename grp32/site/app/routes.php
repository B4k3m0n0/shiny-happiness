<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::post('layout', 'ProjetoController@store');


/*
|--------------------------------------------------------------------------
| Login Routes
|--------------------------------------------------------------------------
*/
Route::get('login', array('as' => 'login', 'uses' => 'UserController@index'));

Route::post('login', array('as' => 'login', 'uses' => 'UserController@login'));


/*
|--------------------------------------------------------------------------
| signup Routes
|--------------------------------------------------------------------------
*/
Route::get('signup', array('as' => 'signup', 'uses' => 'ProjetoController@signup'));

Route::post('signup', array('as' => 'signup', 'uses' => 'UserController@signup'));


/*CHAT ROUTES*/

Route::get('getMessage', 'ChatRoomController@getMessage');

Route::post('storeMessage', 'ChatRoomController@storeMessage');

/*END CHAT ROUTES*/


/*GAME ROUTES*/

Route::get('game', function()
{
	return View::make('projeto/game');
});





/*END GAME ROUTES*/

/*TESTE JOGO*/
Route::get('jogo', function()
{
	return View::make('jogo');
});

Route::post('jogo', 'JogoController@getJogo');


/*TESTE CUBE*/

Route::get('cube', function()
{
	return View::make('cube');
});

Route::get('profile/{userid}', array('as' => 'profile', 'uses' => 'UserController@showProfile')); //TODO mudar de maneira a que nao seja mostrado o id no URL
