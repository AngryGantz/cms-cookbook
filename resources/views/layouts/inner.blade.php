<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 19.12.15
 * Time: 17:29
 */?>

@extends('layouts.master')
@section('body')
    <div class="recipes-home-body inner-page">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-9">
                    @yield('inner')
                </div>
                <div class="col-md-4 col-lg-3">
                    @include('aside.aside')
                </div>
            </div>
        </div>
    </div>
@stop

