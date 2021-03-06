<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 11.12.15
 * Time: 0:35
 */?>

@extends('layouts.master')
@section('body')
    <div class="recipes-home-body inner-page">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-9">
                    <div class="recipe-set submit-recipe-set">
                        <h2>Обратная связь</h2>
                        @if (Sentinel::check())
                            <p>Спасибо за ваше сообщение</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-4 col-lg-3">
                    @include('aside.aside')
                </div>
            </div>
        </div>
    </div>
@stop
