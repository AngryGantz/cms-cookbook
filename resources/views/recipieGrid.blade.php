<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 20.12.15
 * Time: 21:11
 */?>

@extends('layouts.master')
@section('body')
<div class="banner banner-blog">
    <div class="container ">
        <div class="main-heading">
            <h1>{{ $title }}</h1>
        </div>
    </div>
</div>
<div class="recipes-home-body inner-page">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-9">
                <div class="recipe-set">
                    <div class="recipe-listing listing-grid">
                        @include('widgets.recipiescard_list', ['animate' => 'no'])
                    </div>
               </div>
            </div>
            <div class="col-md-4 col-lg-3">
                @include('aside.aside')
            </div>
        </div>
    </div>
</div>
@stop