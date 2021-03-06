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

Route::get('/', array(
	'as'	=> 'home',
	'uses'	=> 'HomeController@getIndex'
));

Route::group(array('before' => 'csrf'), function()
{

	Route::post('/register/user/email', array(
		'as'	=> 'registerUserEmail',
		'uses'	=> 'UserController@registerUserEmail'
	));

	Route::post('/register/user/type', array(
		'as'	=> 'registerUserType',
		'uses'	=> 'UserController@registerUserType'
	));

	Route::post('/register/message', array(
		'as'	=> 'registerMessage',
		'uses'	=> 'UserController@registerMessage'
	));

});