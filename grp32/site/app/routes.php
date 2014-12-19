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


/*DICE TESTES*/

Route::get('randoms', array('as' => 'randoms', 'uses' => 'JogoController@randomDices'));

Route::get('profile', array('as' => 'profile', 'uses' => 'UserController@showProfile'));
Route::post('profile', array('as' => 'profile', 'uses' => 'UserController@editProfile'));



Route::get('logout', array('as' => 'logout', 'uses' => 'UserController@logout'))->before('login'); //TODO por como post
Route::get('lobby', array('as' => 'lobby', 'uses' => 'LobbyController@index'));

