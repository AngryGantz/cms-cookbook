<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 20.12.15
 * Time: 19:44
 */?>




<aside>
    <div class="side-bar">
        @include('aside._right_menu1', [ 'groupid' => 7])
        @include('aside._right_popularRecipies', [ 'num' => 4])
        @include('widgets.advert_aside1', [ 'pos' => 'aside1'])
        @include('aside._right_measure', [ 'num' => 4])
        @include('widgets.advert_aside2', [ 'pos' => 'aside2'])
        @include('aside._right_lastposts', [ 'num' => 4])
        {{--@include('aside._right_social', [ 'num' => 4])--}}
    </div>
</aside>
