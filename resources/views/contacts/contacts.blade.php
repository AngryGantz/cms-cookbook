<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 27.12.15
 * Time: 17:31
 */?>

@extends('layouts.master')
@section('body')
    @include('widgets.home_slider')
    @include('widgets.mainfilter')
    <div class="recipes-home-body inner-page">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-9">
                    <div class="recipe-set submit-recipe-set">
                        <h2>Обратная связь</h2>
                        <div class="submit-recipe-form">
                            @include('contacts._form_contacts_guest')
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

