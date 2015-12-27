<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 23.12.15
 * Time: 21:02
 */?>

<!--advance search form-->
<div class="advance-search search-main open">
    <div class="container">
        <div class="wrapper-search">
            <div class="container-tags">
                    <span class="tag">
                        <span class="tag-inner">
                            Поиск рецептов
                            <i class="fa fa-angle-down"></i>
                        </span>
                    </span>
            </div>
            <div class="outer-advance-search">
{{--                {!! Form::open(array('enctype' => 'multipart/form-data')) !!}--}}
                <form method="POST" action="/filter" id="advance-search">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <fieldset>
                        <div class="inner-advance-search">
                            @include('widgets._filtergroup_form', ['groupid' => 1, 'numgroup' => 0])
                            @include('widgets._filtergroup_form', ['groupid' => 4, 'numgroup' => 1])
                            @include('widgets._filtergroup_form', ['groupid' => 2, 'numgroup' => 2])
                            @include('widgets._filtergroup_form', ['groupid' => 3, 'numgroup' => 3])
                            <button type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<!--advance search form ends-->
