<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 19.12.15
 * Time: 17:38
 */?>


{!! Form::open(array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data')) !!}

<h3>Регистрационные данные</h3>
<p>Доступны только администратору</p>

<div class="form-group{!! $errors->has('email') ? ' has-error' : null !!}">
    <label for="email" class="col-sm-4 control-label">Email</label>
    <div class="col-sm-8">
        {!! Form::email('email', $user->email , array('class' => 'form-control', 'placeholder' => 'Email')) !!}
        <p class="help-block">{!! $errors->first('email') !!}</p>
    </div>
</div>

<div class="form-group{!! $errors->has('password') ? ' has-error' : null !!}">
    <label for="password" class="col-sm-4 control-label">Пароль</label>
    <div class="col-sm-8">
        {!! Form::password('password',  array('class' => 'form-control', 'placeholder' => 'Пароль')) !!}
        <p class="help-block">{!! $errors->first('password') !!}</p>
    </div>
</div>


<div class="form-group{!! $errors->has('password') ? ' has-error' : null !!}">
    <label for="password_confirm" class="col-sm-4 control-label">Подтверждение пароля</label>
    <div class="col-sm-8">
        {!! Form::password('password_confirm', array('class' => 'form-control', 'placeholder' => 'Повторить пароль (только при смене)')) !!}
        <p class="help-block">{!! $errors->first('password_confirm') !!}</p>
    </div>
</div>

<h3>Публичные данные</h3>
<p>Могут видеть все</p>


<div class="form-group{!! $errors->has('first_name') ? ' has-error' : null !!}">
    <label for="first_name" class="col-sm-4 control-label">Имя</label>
    <div class="col-sm-8">
        {!! Form::text('first_name', $user->first_name, array('class' => 'form-control', 'placeholder' => 'Имя')) !!}
        <p class="help-block">{!! $errors->first('first_name') !!}</p>
    </div>
</div>

<div class="form-group{!! $errors->has('last_name') ? ' has-error' : null !!}">
    <label for="last_name" class="col-sm-4 control-label">Фамилия</label>
    <div class="col-sm-8">
        {!! Form::text('last_name', $user->last_name, array('class' => 'form-control', 'placeholder' => 'Фамилия')) !!}
        <p class="help-block">{!! $errors->first('last_name') !!}</p>
    </div>
</div>

<div class="form-group{!! $errors->has('about') ? ' has-error' : null !!}">
    <label for="about" class="col-sm-4 control-label">О себе</label>
    <div class="col-sm-8">
        {!! Form::textarea('about', $user->about, array('class' => 'form-control', 'placeholder' => 'Немного о себе')) !!}
        <p class="help-block">{!! $errors->first('about') !!}</p>
    </div>
</div>

<div class="form-group{!! $errors->has('public_email') ? ' has-error' : null !!}">
    <label for="public_email" class="col-sm-4 control-label">Публичный Email</label>
    <div class="col-sm-8">
        {!! Form::text('public_email', $user->last_name, array('class' => 'form-control', 'placeholder' => 'Публичный Email')) !!}
        <p class="help-block">{!! $errors->first('public_email') !!}</p>
    </div>
</div>

<div class="form-group{!! $errors->has('skype') ? ' has-error' : null !!}">
    <label for="skype" class="col-sm-4 control-label">Skype</label>
    <div class="col-sm-8">
        {!! Form::text('skype', $user->last_name, array('class' => 'form-control', 'placeholder' => 'Skype')) !!}
        <p class="help-block">{!! $errors->first('skype') !!}</p>
    </div>
</div>

<div class="form-group{!! $errors->has('site') ? ' has-error' : null !!}">
    <label for="site" class="col-sm-4 control-label">Сайт</label>
    <div class="col-sm-8">
        {!! Form::text('site', $user->last_name, array('class' => 'form-control', 'placeholder' => 'Сайт')) !!}
        <p class="help-block">{!! $errors->first('site') !!}</p>
    </div>
</div>

<div class="form-group{!! $errors->has('social_fb') ? ' has-error' : null !!}">
    <label for="social_fb" class="col-sm-4 control-label">Face Book</label>
    <div class="col-sm-8">
        {!! Form::text('social_fb', $user->last_name, array('class' => 'form-control', 'placeholder' => 'Face Book')) !!}
        <p class="help-block">{!! $errors->first('social_fb') !!}</p>
    </div>
</div>

<div class="form-group{!! $errors->has('social_twitter') ? ' has-error' : null !!}">
    <label for="social_twitter" class="col-sm-4 control-label">Twitter</label>
    <div class="col-sm-8">
        {!! Form::text('social_twitter', $user->last_name, array('class' => 'form-control', 'placeholder' => 'Twitter')) !!}
        <p class="help-block">{!! $errors->first('social_twitter') !!}</p>
    </div>
</div>

<div class="form-group{!! $errors->has('social_gplus') ? ' has-error' : null !!}">
    <label for="social_gplus" class="col-sm-4 control-label">Google+</label>
    <div class="col-sm-8">
        {!! Form::text('social_gplus', $user->last_name, array('class' => 'form-control', 'placeholder' => 'Google+')) !!}
        <p class="help-block">{!! $errors->first('social_gplus') !!}</p>
    </div>
</div>

<div class="form-group{!! $errors->has('social_vk') ? ' has-error' : null !!}">
    <label for="social_vk" class="col-sm-4 control-label">В Контакте</label>
    <div class="col-sm-8">
        {!! Form::text('social_vk', $user->last_name, array('class' => 'form-control', 'placeholder' => 'В Контакте')) !!}
        <p class="help-block">{!! $errors->first('social_vk') !!}</p>
    </div>
</div>

<label for="avatar" class="col-sm-4 control-label">Аватар</label>
<div class="col-sm-8">
<div class="upload">
    <div class="file-preview"><img src="{{ URL::to('imgpref/' . $user->avatar).'/100/100'  }}" alt=""><br>нажмите для загрузки</div>
    <input type="file" name="avatar" style="display: none;" >
</div>
</div>
<br><br><br><br><br><br>


<div class="form-group">
    <div class="col-sm-8 col-sm-push-4">
        {!! Form::submit('Сохранить', array('class' => 'btn btn-primary')) !!}
    </div>
</div>

{!! Form::close() !!}
