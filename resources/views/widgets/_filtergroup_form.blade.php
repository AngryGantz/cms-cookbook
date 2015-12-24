<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 23.12.15
 * Time: 21:06
 *
 * $groupid - id Group Markers
 *
 */?>

<div class="form-field">
    <label for="filtergroup">{{\App\MarkerGroup::find($groupid)->name}}</label>
    <select name="filtergroup[]" id="ingredient" class="advance-selectable">
        <option value="0" selected="selected">Не задано</option>
        @foreach(\App\MarkerGroup::find($groupid)->markers as $marker )
            <option value="{{$marker->id}}">{{$marker->name}}</option>
        @endforeach
    </select>
</div>
