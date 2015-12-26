<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 26.12.15
 * Time: 2:27
 */?>
{{--{{dd($name)}}--}}
{{--{{dd($instance->tagNames())}}--}}
<?php $tagnames = implode(", ", $instance->tagNames()); ?>
{{--{{dd($tagnames)}}--}}

<div class="form-group">
    <label for="newtags">Тэги</label>
    <input class="form-control" name="newtags" type="text" id="newtags" value="{{ $tagnames }}">
    {{--@include(AdminTemplate::view('formitem.errors'))--}}
</div>



{{--<div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">--}}
    {{--<label for="{{ $name }}">{{ $label }}</label>--}}
    {{--<input class="form-control" name="{{ $name }}" type="text" id="{{ $name }}" value="{{ $value }}" @if(isset($readonly))readonly="{{ $readonly }}" @endif>--}}
    {{--@include(AdminTemplate::view('formitem.errors'))--}}
{{--</div>--}}
