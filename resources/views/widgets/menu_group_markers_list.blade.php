<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 23.12.15
 * Time: 17:37
 * 
 * $groupid - id Group Markers
 * 
 */?>

<li>
    <a href="">{{\App\MarkerGroup::find($groupid)->name}}</a>
    <ul>
    @foreach(\App\MarkerGroup::find($groupid)->markers as $marker )
        <li><a href="{{URL::to('menu/' . $marker->id)}}">{{$marker->name}}</a></li>
    @endforeach
    </ul>
</li>