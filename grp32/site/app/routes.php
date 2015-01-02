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
| Signup Routes
|--------------------------------------------------------------------------
*/
Route::get('signup', array('as' => 'signup', 'uses' => 'ProjetoController@signup'));

Route::post('signup', array('as' => 'signup', 'uses' => 'UserController@signup'));


/*GAME ROUTES*/

Route::get('game', function()
{
	return View::make('projeto/game');
});


/*END GAME ROUTES*/

/*TESTE JOGO*/
/*Route::get('game', array('as' => 'game', 'uses' => 'JogoController@index'));*/


/*TESTE CUBE*/

Route::get('cube', function()
{
	return View::make('cube');
});


/*GAME LOGIC ROUTES*/
Route::post('getDice', array('as' => 'getDice', 'uses' => 'GameController@generateDice'));
Route::post('currentPlay', array('as' => 'currentPlay', 'uses' => 'GameController@currentPlay'));

/*GAME CREATE*/
Route::post('createGame', array('as' => 'createGame', 'uses' => 'GameController@create'));
Route::post('updateGame', array('as' => 'updateGame', 'uses' => 'GameController@update'));

/*LOBBY*/
Route::get('lobby', array('as' => 'lobby', 'uses' => 'LobbyController@index'));

/*START GAME*/
Route::post('startGame', array('as' => 'startGame', 'uses' => 'GameController@start'));
Route::get('game/{id}', array('as' => 'game', 'uses' => 'GameController@index'));=======


Route::get('logout', array('as' => 'logout', 'uses' => 'UserController@logout'))->before('login'); //TODO por como post

Route::get('scores', array('as' => 'scores', 'uses' => 'LobbyController@showScores'));
Route::post('profile', array('as' => 'profile', 'uses' => 'UserController@editProfile'));

