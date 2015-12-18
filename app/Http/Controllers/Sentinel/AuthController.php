<?php

namespace App\Http\Controllers\Sentinel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;
use Input;
use Validator;
use Redirect;
use Sentinel;
use Activation;
use Mail;
use Reminder;

use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;

class AuthController extends BaseController {

	/**
	 *  Show login page
	 */
	function login()
	{
		return view('auth.login');
	}

	/**
	 * Handle posting of the form for logging the user in.
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function processLogin()
	{
		try
		{
			$input = Input::all();

			$rules = [
				'email'    => 'required|email',
				'password' => 'required',
			];

			$validator = Validator::make($input, $rules);

			if ($validator->fails())
			{
				return Redirect::back()
					->withInput()
					->withErrors($validator);
			}

			$remember = (bool) Input::get('remember', false);

			if (Sentinel::authenticate(Input::all(), $remember))
			{
				return Redirect::intended('/');
			}

			$errors = 'Неправильный логин или пароль.';
		}
		catch (NotActivatedException $e)
		{
			$errors = 'Ваш аккаунт не ативирован! Поищите в своем почтовом ящике письмо со ссылкой для активации.';

			return Redirect::to('reactivate')->with('user', $e->getUser());
		}
		catch (ThrottlingException $e)
		{
			$delay = $e->getDelay();

			$errors = "Ваш аккаунт блокирован на {$delay} секунд.";
		}

		return Redirect::back()
			->withInput()
			->withErrors($errors);
	}
	/**
	 * Logout
	 */
	function logout()
	{
		Sentinel::logout();
		return Redirect::to('/');		
	}
	/**
	 *  Show register page
	 */
	function register()
	{
		return view('auth.register');
	}

	/**
	 *  Process of registration
	 */
	function processRegister()
	{
		$input = Input::all();

		$rules = [
			'email'            => 'required|email|unique:users',
			'password'         => 'required',
			'password_confirm' => 'required|same:password',
		];

		$validator = Validator::make($input, $rules);

		if ($validator->fails())
		{
			return Redirect::back()
				->withInput()
				->withErrors($validator);
		}

		if ($user = Sentinel::register($input))
		{
			$activation = Activation::create($user);

			$code = $activation->code;

			$sent = Mail::send('auth.email.activate', compact('user', 'code'), function($m) use ($user)
			{
				$m->from('hello@app.com', 'LaravelTest');
				$m->to($user->email)->subject('Активация аккаунта');
			});

			if ($sent === 0)
			{
				return Redirect::to('register')
					->withErrors('Ошибка отправки письма активации.');
			}

			return view('auth.wait');
			// return Redirect::to('login')
			// 	->withSuccess('Ваш аккаунт создан, вы сможете войти в систему используя свой логин и пароль ')
			// 	->with('userId', $user->getUserId());
		}

		return Redirect::to('register')
			->withInput()
			->withErrors('Failed to register.');
	}

	/**
	 *  Reset password.  Show form for submit
	 */
	function reset()
	{
		return view('auth.beginReset');
	}
	/**
	 *  Reset password. Submit for reset
	 */
	function resetProcess()
	{
		$rules = [
			'email' => 'required|email',
		];

		$validator = Validator::make(Input::get(), $rules);

		if ($validator->fails())
		{
			return Redirect::back()
				->withInput()
				->withErrors($validator);
		}

		$email = Input::get('email');

		$user = Sentinel::findByCredentials(compact('email'));

		if ( ! $user)
		{
			return Redirect::back()
				->withInput()
				->withErrors('Пользователя с таким Email адресом нет в нашей системе.');
		}

		$reminder = Reminder::exists($user) ?: Reminder::create($user);

		$code = $reminder->code;

		$sent = Mail::send('auth.email.reminder', compact('user', 'code'), function($m) use ($user)
		{
			$m->from('hello@app.com', 'LaravelTest Reset Password');
			$m->to($user->email)->subject('Сброс пароля.');
		});

		if ($sent === 0)
		{
			return Redirect::to('register')
				->withErrors('Неизвестная ошибка отправки письма. Попробуйте позже или обратитесь к администратору.');
		}

		return Redirect::to('wait');		
	}

	/**
	 *  Reset password.  Show wait page
	 */
	function wait()
	{
		return view('auth.wait');
	}
}