<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('home');
// });


// Home Page route
Route::get('/', 'HomeController@index');


/**
 *  Routes for Autorization/Registration users
 */

// show login page
Route::get('/login', 'Sentinel\AuthController@login');
// post login data from login form route
Route::post('/login', 'Sentinel\AuthController@processLogin');

// logout
Route::get('/logout', 'Sentinel\AuthController@logout');

// show register page
Route::get('/register', 'Sentinel\AuthController@register');

// post register data from register form route
Route::post('/register', 'Sentinel\AuthController@processRegister');

//  Activate account by link in Email
Route::get('activate/{id}/{code}', function($id, $code)
{
	$user = Sentinel::findById($id);
	if ( ! Activation::complete($user, $code))
	{
		return Redirect::to("login")
			->withErrors('Invalid or expired activation code.');
	}
	return Redirect::to('login')
		->withSuccess('Account activated.');
})->where('id', '\d+');


//  Page with message about Email with link to reset password
Route::get('/wait', 'Sentinel\AuthController@wait');


/**
 *  Routes for Reset password
 */

// Show page for begin process reset password
Route::get('/reset', 'Sentinel\AuthController@reset');

// Submit user for reset password
Route::post('/reset', 'Sentinel\AuthController@resetProcess');

Route::get('reset/{id}/{code}', function($id, $code)
{
	$user = Sentinel::findById($id);

	return View::make('auth.completeReset');

})->where('id', '\d+');

Route::post('reset/{id}/{code}', function($id, $code)
{
	$rules = [
		'password' => 'required|confirmed',
	];

	$validator = Validator::make(Input::get(), $rules);

	if ($validator->fails())
	{
		return Redirect::back()
			->withInput()
			->withErrors($validator);
	}

	$user = Sentinel::findById($id);

	if ( ! $user)
	{
		return Redirect::back()
			->withInput()
			->withErrors('Пользователя не существует.');
	}

	if ( ! Reminder::complete($user, $code, Input::get('password')))
	{
		return Redirect::to('login')
			->withErrors('Неправильный или просроченный код сброса.');
	}

	return Redirect::to('login')
		->withSuccess("Пароль сброшен.");
})->where('id', '\d+');


// Add post from front-end
Route::get('/addpost', 'PostController@addpost');

// Add post from front-end
Route::post('/addpost', 'PostController@store');


// Route::post('/addpost', function () {
//   return dd(Input::all());
// });