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

// Route to show the login form 
Route::get('login', array('as' => 'login' , 'uses' => 'UsersController@showLogin'));

// route to process the form 
Route::post('/login', array('as' => 'login', 'uses' => 'UsersController@handleLogin'));
/* Route to register page 
Route::get('register', array('uses' => 'HomeController@showRegister'));
*/
Route::get('/profile', array('as' => 'profile', 'uses' => 'UsersController@profile'));
// logout route 
Route::get('/logout', array('as' => 'logout', 'uses' => 'UsersController@logout'));

Route::resource('users', 'UsersController');
 //Route::get('/edit/{id}', array('as' => 'edit', 'uses' => 'UsersController@edit'));
