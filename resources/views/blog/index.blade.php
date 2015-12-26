<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 25.12.15
 * Time: 22:07
 */?>
@extends('layouts.master')
@section('body')
    <div class="banner banner-blog">
        <div class="container ">
            <div class="main-heading">
                <h1>{{ $page_title }}</h1>
            </div>
        </div>
    </div>
    @include('widgets.mainfilter')

    <div class="wrapper-main-contents">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-9">
                     @foreach($blogposts as $blogpost)
                        @include('blog._index_onepost', ['blogpost' => $blogpost])
                    @endforeach
                    <?php echo $blogposts->render(); ?>
                </div>
                <div class="col-md-4 col-lg-3">
                    @include('aside.aside')
                </div>
            </div>
        </div>
    </div>
@stop

