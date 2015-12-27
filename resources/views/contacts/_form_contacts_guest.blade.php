<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 27.12.15
 * Time: 17:31
 */?>


{!! Form::open(array('enctype' => 'multipart/form-data')) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    @include('widgets._formitem_text', ['name' => 'name', 'title' => 'Имя*', 'placeholder' => '' ] )
    @include('widgets._formitem_text', ['name' => 'email', 'title' => 'Email*', 'placeholder' => '' ] )
    @include('widgets._formitem_textarea', ['name' => 'note', 'title' => 'Сообщение*', 'placeholder' => '' ] )

    {{--<div class="{!! $errors->has('name') ? 'has-error' : null !!}">--}}
        {{--<label for="name">Имя</label>--}}
        {{--{!! Form::text('name', null, array('placeholder' => 'Имя*')) !!}--}}
        {{--<p class="help-block">{!! $errors->first('name') !!}</p>--}}
    {{--</div>--}}

    <div class="form-group">
        <div class="col-sm-8 col-sm-push-4">
            {!! Form::submit('Отправить', array('class' => 'btn btn-primary')) !!}
        </div>
    </div>

{!! Form::close() !!}