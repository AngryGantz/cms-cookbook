<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 18.12.15
 * Time: 22:19
 */
?>

@extends('layouts.master')

@section('body')
    <div class="banner banner-blog">
        <div class="container ">
            <div class="main-heading">
                <h1>Подробно о рецепте</h1>
            </div>
        </div>
    </div>
    <div class="recipes-home-body inner-page">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-9">
                    @include('recipie.recipieSingle_body')
                </div>
                <div class="col-md-4 col-lg-3">
                    @include('aside.aside')
                </div>
            </div>
        </div>
    </div>
@stop