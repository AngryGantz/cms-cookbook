<ul>
	@if ( ! Sentinel::check())
		<li><a href="{{ URL::to('login') }}" title="">Вход</a></li>
		<li><a href="{{ URL::to('register') }}" title="">Регистрация</a></li>
	@else 
		<li><a href="{{ URL::to('logout') }}" title="">Выход</a></li>
		<li><a href="register" title="">Кабинет</a></li>
	@endif
</ul>