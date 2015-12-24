@extends('layouts.master')
@section('body')
<div class="recipes-home-body inner-page">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-lg-9">
				<div class="recipe-set submit-recipe-set">
					<h2>Добавление рецепта</h2>
					@if ( ! Sentinel::check())
						<p>Добавлять рецепты могут только зарегистрированные пользователи. Пожалуйста авторизуйтесь в системеме или пройдите несложную процедуру регистрации.</p>
					@else
						<div class="submit-recipe-form">
							@include('recipie._addform')
						</div>
					@endif
				</div>
			</div>
			<div class="col-md-4 col-lg-3">
				@include('aside.aside')
			</div>
		</div>
	</div>
</div>
@stop