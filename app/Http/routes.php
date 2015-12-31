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

Route::get('reactivate', function()
{
	if ( ! $user = Sentinel::check())
	{
		return Redirect::to('login');
	}

	$activation = Activation::exists($user) ?: Activation::create($user);

	// This is used for the demo, usually you would want
	// to activate the account through the link you
	// receive in the activation email
	Activation::complete($user, $activation->code);

	// $code = $activation->code;

	// $sent = Mail::send('sentinel.emails.activate', compact('user', 'code'), function($m) use ($user)
	// {
	// 	$m->to($user->email)->subject('Activate Your Account');
	// });

	// if ($sent === 0)
	// {
	// 	return Redirect::to('register')
	// 		->withErrors('Failed to send activation email.');
	// }

	return Redirect::to('account')
			->withSuccess('Account activated.');
})->where('id', '\d+');



// Add post from front-end
Route::get('/addpost', 'PostController@addpost');

// Add post from front-end
Route::post('/addpost', 'PostController@store');


// Route::post('/addpost', function () {
//   return dd(Input::all());
// });


Route::get('imgpref/images/useruploads/{dateimg?}/{filename}/{w?}/{h?}', function($dateimg='', $filename,  $w=150, $h=150){
	$cacheimage = Image::cache(function($image) use( $dateimg, $filename, $w, $h){
		$filepath = 'images/useruploads/' . $dateimg .'/'. $filename;
		if(!file_exists($filepath))
		{
			$filepath =  'images/useruploads/' . $dateimg;
			$h = $w;
			$w = $filename;
		}
		if ($h < 10000) {
			return $image->make($filepath)->resize($w, $h);
		} else {
			return $image->make($filepath)->resize($w, null, function ($constraint)
			{
				$constraint->aspectRatio();
				$constraint->upsize();
			});
		}
	});
	return Response::make($cacheimage, 200, array('Content-Type' => 'image/jpeg'));
});


Route::get('imager/{pathkey}/{filename}/{w?}/{h?}', function($pathkey, $filename, $w=150, $h=150){
    $cacheimage = Image::cache(function($image) use($pathkey, $filename, $w, $h){
        switch($pathkey){
            case 'useruploads':
                $filepath = 'public/images/useruploads/' . $filename;
                break;
            case 'fullpath':
            	$filepath = 'images/useruploads/' . $filename;
            	break;
        }
		if ($h < 10000) {
			return $image->make($filepath)->resize($w, $h);
		} else {
			return $image->make($filepath)->resize($w, null, function ($constraint)
			{
				$constraint->aspectRatio();
				$constraint->upsize();
			});
		}
    });

    return Response::make($cacheimage, 200, array('Content-Type' => 'image/jpeg'));
});

// Show one recipie
Route::get('/recipie/{id}', 'HomeController@showRecipie');

// show users profile
Route::get('/user/{id}', 'UserController@show');
Route::post('/user/{id}', 'UserController@update');

Route::get('/setratingpost/{rate}/{id}', 'PostController@setRating');

Route::post('/addcomment/{id}', 'PostController@addComment');

Route::get('/menu/{id}', 'PostController@showRecipiesByMarker');

Route::post('subsnews', 'HomeController@subscribeNews');

Route::post('/filter', 'HomeController@filterRecipies');

Route::get('/recipies/{slug}', 'PostController@showRecipieUrlWithSlug');

/**
 *
 * BlogPost Routes
 *
 */

Route::get('addblogpost', 'BlogPostController@create');
Route::post('addblogpost', 'BlogPostController@store');
Route::get('blog/index/', 'BlogPostController@index');
Route::get('blog/{id}', 'BlogPostController@show');
Route::post('/blog/addcomment/{id}', 'BlogPostController@addComment');
Route::get('blog/tags/{slug}', 'BlogPostController@showByTag');

/**
 *
 * Contacts route
 *
 */
Route::get('contacts', 'HomeController@contacts');
Route::post('contacts', 'HomeController@contactsProcess');
