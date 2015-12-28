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
use App\User;
use App\Models\CmsOption;

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
				'g-recaptcha-response' => 'required|recaptcha',
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


			$user = User::where('email', '=', $input['email'] )->firstOrFail();
			$user = Sentinel::findById($user->id);
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
			$errors = 'Ваш аккаунт не ативирован! Поищите в своем почтовом ящике письмо со ссылкой для активации (Вам отправлено повторное письмо). ';
			return view('auth.wait')->withErrors($errors);

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
			'g-recaptcha-response' => 'required|recaptcha',
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
				$m->from('automail@mychefs.ru', 'Кулинарный портал mychefs.ru');
				$m->to($user->email)->subject('Активация аккаунта');
			});
			if ($sent === 0)
			{
				return Redirect::to('register')
					->withErrors('Ошибка отправки письма активации.');
			}
			$emailToAdmin=CmsOption::getValue('Email для оповещения');
			Mail::send('auth.email.notify_registration', compact('user', 'code'), function($m) use ($user, $emailToAdmin)
			{
				$m->from('automail@mychefs.ru', 'Кулинарный портал mychefs.ru');
				$m->to($emailToAdmin)->subject('mychefs.ru Регистрация нового юзера');
			});
			return view('auth.wait');
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