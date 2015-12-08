<?php

namespace App\Http\Controllers\Sentinel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;

class AuthController extends BaseController {


	function login()
	{
		return view('auth.login');
	}

	function register()
	{
		return view('auth.register');
	}


}