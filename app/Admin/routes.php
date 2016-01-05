<?php

Route::get('', [
	'as' => 'admin.home',
	function ()
	{
		$content = 'Тут потом нарисую какую-нибудь фигню, пока не придумал.';
		return Admin::view($content, 'Dashboard');
	}
]);

Route::post('/posts/{id?}', '\App\Http\Controllers\PostController@adminStore');

Route::post('eloquent_users', '\App\Http\Controllers\AuthController@adminUserCreate');
Route::post('eloquent_users/{id}', '\App\Http\Controllers\AuthController@adminUserUpdate');
Route::post('roles', '\App\Http\Controllers\AuthController@adminRoleCreate');
Route::post('roles/{id}', '\App\Http\Controllers\AuthController@adminRoleUpdate');

