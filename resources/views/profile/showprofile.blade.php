<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 19.12.15
 * Time: 17:21
 */?>

@extends('layouts.inner')
@section('inner')
    <h1>Профиль пользователя</h1>
    <br><br><br>
    @if (($curUser = Sentinel::check()) and ($curUser->id == $user->id) )
        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
            <li class="active"><a href="#public" data-toggle="tab">Публичный профайл</a></li>
            <li><a href="#edit" data-toggle="tab">Редактировать</a></li>
        </ul>
        <div id="my-tab-content" class="tab-content">
            <div class="tab-pane active" id="public">
                <br><br><br>
                @include('profile._showprofile_public')
            </div>
            <div class="tab-pane" id="edit">
                <br><br><br>
                @include('profile._editprofile')
            </div>
        </div>
    @else
        @include('profile._showprofile_public')
    @endif
@stop

