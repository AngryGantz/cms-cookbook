{!! Form::open(array('class' => 'form-horizontal')) !!}

	<div class="form-group{!! $errors->has('email') ? ' has-error' : null !!}">
		<label for="email" class="col-sm-4 control-label">Email</label>
		<div class="col-sm-8">
			{!! Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Email')) !!}
			<p class="help-block">{!! $errors->first('email') !!}</p>
		</div>
	</div>

	<div class="form-group{!! $errors->has('password') ? ' has-error' : null !!}">
		<label for="password" class="col-sm-4 control-label">Пароль</label>
		<div class="col-sm-8">
			{!! Form::password('password', array('class' => 'form-control', 'placeholder' => 'Пароль')) !!}
			<p class="help-block">{!! $errors->first('password') !!}</p>
		</div>
	</div>

	<div class="form-group{!! $errors->has('password') ? ' has-error' : null !!}">
		<label for="password_confirm" class="col-sm-4 control-label">Подтверждение пароля</label>
		<div class="col-sm-8">
			{!! Form::password('password_confirm', array('class' => 'form-control', 'placeholder' => 'Повторить пароль')) !!}
			<p class="help-block">{!! $errors->first('password_confirm') !!}</p>
		</div>
	</div>

	<div class="form-group{!! $errors->has('recaptcha') ? ' has-error' : null !!}">
		<label for="recaptcha" class="col-sm-4 control-label"></label>
		<div class="col-sm-8">
			{!! Recaptcha::render() !!}
			<p class="help-block">{!! $errors->first('recaptcha') !!}</p>
		</div>
	</div>


	<div class="form-group">
		<div class="col-sm-8 col-sm-push-4">
			{!! Form::submit('Регистрация', array('class' => 'btn btn-primary')) !!}
			{!! Form::reset('Сброс', array('class' => 'btn btn-default')) !!}
		</div>
	</div>

{!! Form::close() !!}