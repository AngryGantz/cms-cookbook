<?php

Route::get('', [
	'as' => 'admin.home',
	function ()
	{
		$content = 'Define your dashboard here.';
		return Admin::view($content, 'Dashboard');
	}
]);

Route::post('/posts/{id}', '\App\Http\Controllers\PostController@adminStore');