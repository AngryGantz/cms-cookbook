<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 20.12.15
 * Time: 19:44
 */?>




<aside>
    <div class="side-bar">
        @include('aside._right_menu1', [ 'groupid' => 3])
        @include('aside._right_popularRecipies', [ 'num' => 4])
        @include('aside._right_advert', [ 'num' => 4])
        @include('aside._right_measure', [ 'num' => 4])
        @include('aside._right_overlay', [ 'num' => 4])
        @include('aside._right_lastposts', [ 'num' => 4])
        {{--@include('aside._right_social', [ 'num' => 4])--}}


    </div>
</aside>
