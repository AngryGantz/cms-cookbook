@extends('template')

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
			<label for="email" class="col-sm-4 control-label">Email</label>
			<div class="col-sm-8">
				{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Ваш Email']) !!}
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-8 col-sm-push-4">
				{!! Form::submit('Сбросить пароль', ['class' => 'btn btn-lg btn-primary']) !!}
			</div>
		</div>

	{!! Form::close() !!}
</div>

@stop
