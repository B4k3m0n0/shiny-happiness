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

Route::post('login', 'LoginController@login');

Route::get('login', 'ProjetoController@index');

Route::get('signup', 'ProjetoController@signup');

Route::post('signup', 'LoginController@signup');


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