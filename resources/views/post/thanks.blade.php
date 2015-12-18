<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 11.12.15
 * Time: 0:35
 */?>

@extends('template')
@section('body')
    <div class="recipes-home-body inner-page">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-9">
                    <div class="recipe-set submit-recipe-set">
                        <h2>Добавление рецепта</h2>
                        @if (Sentinel::check())
                            <p>Спасибо за то, что нашли время поделиться рецептом с посетителями сайта.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
