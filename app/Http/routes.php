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

Route::get('register', 'AuthController@register');
Route::post('register', 'AuthController@registerProcess');
Route::get('activate/{id}/{code}', 'AuthController@activate');
Route::get('login', 'AuthController@login');
Route::post('login', 'AuthController@loginProcess');
Route::get('logout', 'AuthController@logoutuser');

Route::get('reset', 'AuthController@resetOrder');
Route::post('reset', 'AuthController@resetOrderProcess');
Route::get('reset/{id}/{code}', 'AuthController@resetComplete');
Route::post('reset/{id}/{code}', 'AuthController@resetCompleteProcess');
Route::get('wait', 'AuthController@wait');



// Add post from front-end
Route::get('/addpost', 'PostController@addpost');
// Add post from front-end
Route::post('/addpost', 'PostController@store');

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

Route::get('storage/app/avatars/{filename}/{w?}/{h?}', function( $filename,  $w=150, $h=150){
	$cacheimage = Image::cache(function($image) use( $filename, $w, $h){
		$filepath = storage_path() . '/app/avatars/' . $filename;
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

Route::get('/menu/{id}', [ 'as' => 'post.showbymarker', 'uses' => 'PostController@showRecipiesByMarker']);
//Route::get('/menu/{id}', 'PostController@showRecipiesByMarker');
Route::get('/menus/{slug}', [ 'as' => 'post.showbymarker', 'uses' => 'PostController@showRecipiesByMarkerBySlug']);
//Route::get('/menu/{id}', 'PostController@showRecipiesByMarker');



Route::post('subsnews', 'HomeController@subscribeNews');

Route::post('/filter', 'HomeController@filterRecipies');

//Route::get('/recipies/{slug}', 'PostController@showRecipieUrlWithSlug');

Route::get('/recipies/{slug}', [ 'as' => 'post.showslug', 'uses' => 'PostController@showRecipieUrlWithSlug']);

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

/**
 * Route for social auth
 */
Route::get('/socialite/{provider}',
		[
				'as' => 'socialite.auth',
				function ( $provider ) {
					return \Socialite::driver( $provider )->redirect();
				}
		]
);
Route::get('/socialite/{provider}/callback', 'SocialController@supervisor');

Route::get('sitemap', 'SitemapsController@posts');

Route::get('recip/{post}',[ 'as' => 'post.show',  function(App\Post $post)
{
	$title = $post->htmltitle  . ' | ' . App\Models\CmsOption::getValue('Название сайта');
	$metaOptions = ['recipie' => $post];
	return view('recipieSingle', [ 'recipie' => $post, 'title' => $title, 'metaOptions' => $metaOptions ]);
}
	]
);

