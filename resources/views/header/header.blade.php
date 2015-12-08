<ul>
	@if ( ! Sentinel::check())
		<li><a href="login" title="">Вход</a></li>
		<li><a href="register" title="">Регистрация</a></li>
	@else 
		<li><a href="login" title="">Выход</a></li>
		<li><a href="register" title="">Кабинет</a></li>
	@endif
</ul>