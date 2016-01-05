<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 04.01.16
 * Time: 23:52
 *
 * param $name  - field name
 * param $title - field label
 * param $placeholder - placeholder for input
 * param $value - value field or null if not set
 *
 */?>

<?php if(! isset($value)) $value = null ?>
<div class="{!! $errors->has($name) ? 'has-error' : null !!}">
    <label for="{!! $name !!}">{{ $title }}</label>
    {!! Form::password($name, $value, array('placeholder' =>  $placeholder )) !!}
    <p class="help-block">{!! $errors->first($name) !!}</p>
</div>

