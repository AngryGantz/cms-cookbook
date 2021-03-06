@extends('layouts.master')

@section('title')
Сброс пароля
@stop

@section('body')

<div class="container">

	<div class="page-header">
		<h1>Сброс пароля</h1>
	</div>

	{!! Form::open(['class' => 'form-horizontal']) !!}

		<div class="form-group">
			<label for="password" class="col-sm-4 control-label">Новый пароль</label>
			<div class="col-sm-8">
				{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Новый пароль']) !!}
			</div>
		</div>

		<div class="form-group">
			<label for="password-confirmation" class="col-sm-4 control-label">Подтвердите новый пароль</label>
			<div class="col-sm-8">
				{!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Подтверждение пароля']) !!}
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-8 col-sm-push-4">
				{!! Form::submit('Сброс', ['class' => 'btn btn-lg btn-primary']) !!}
			</div>
		</div>

	{!! Form::close() !!}
</div>

@stop
