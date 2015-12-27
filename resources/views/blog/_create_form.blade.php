<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 25.12.15
 * Time: 21:30
 */?>


{!! Form::open(array('enctype' => 'multipart/form-data')) !!}
<input type="hidden" name="_token" value="{{ csrf_token() }}">
{{-- Name BlogPost --}}
<div class="{!! $errors->has('title') ? ' has-error' : null !!}">
    <label for="title">Заголовок</label>
    {!! Form::text('title', null, array('placeholder' => '')) !!}
    <p class="help-block">{!! $errors->first('title') !!}</p>
</div>


{{-- BlogPost Image  --}}
<div class="upload">
    <label for="imgpost">Изображение</label>
    <div class="file-preview"><i class="fa fa-picture-o fa-3x"></i></div>
    <input type="file" name="imgpost" style="display: none;" >
</div>
<br>

{{-- Text --}}
<div class="{!! $errors->has('text') ? ' has-error' : null !!}">
    <label for="text">Статья</label>
    {!! Form::textarea('text', null, array('placeholder' => '', 'rows' => '12')) !!}
    <p class="help-block">{!! $errors->first('text') !!}</p>
</div>

{{-- Tags BlogPost --}}
<div class="{!! $errors->has('tags') ? ' has-error' : null !!}">
    <label for="tags">Тэги (через запятую)</label>
    {!! Form::text('tags', null, array('placeholder' => '')) !!}
    <p class="help-block">{!! $errors->first('tags') !!}</p>
</div>

<div class="form-group">
    <div class="col-sm-8 col-sm-push-4">
        {!! Form::submit('Отправить', array('class' => 'btn btn-primary')) !!}
    </div>
</div>
{!! Form::close() !!}
