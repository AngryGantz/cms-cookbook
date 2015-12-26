<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 19.12.15
 * Time: 17:34
 */?>

<div class="profile">
    <div class="row">
        <div class="col-sm-4">
            <img src="{{ URL::to('/imager/fullpath/' . basename($user->avatar)).'/250/10000'  }}" alt="">
        </div>
        <div class="col-sm-8">
            <h3>{{ $user->first_name }} {{ $user->last_name }}</h3>

            {{--@if ($user->public_email != '')--}}
                <p><span class="lbl">Email: </span>{{ $user->public_email }}</p>
            {{--@endif--}}

            {{--@if ($user->public_email != '')--}}
            <p><span class="lbl">Skype: </span>{{ $user->skype }}</p>
            {{--@endif--}}

            {{--@if ($user->public_email != '')--}}
            <p><span class="lbl">Сайт: </span>{{ $user->site }}</p>
            {{--@endif--}}
            <div class="tags-icons">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="details-social-icons">
                            <ul class="ulsocial_profile">
                                <li><a href="{{ $user->social_fb }}"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="{{ $user->social_twitter }}"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="{{ $user->social_gplus }}"><i class="fa fa-google-plus"></i></a></li>
                                {{--<li><a href="#"><i class="fa fa-pinterest"></i></a></li>--}}
                                <li><a href="{{ $user->social_vk }}"><i class="fa fa-vk"></i></a></li>
                                {{--<li><a href="#"><i class="fa fa-odnoklassniki"></i></a></li>--}}
                                {{--<li><a href="#"><i class="fa fa-plus"></i></a></li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="row">
        <h4>О себе</h4>
        <br>
        {{ $user->about }}
    </div>
    <br>
    <div class="row">
        <h4>Опубликованные рецепты</h4>
        <?php $recipies = $user->posts ?>
        <div class="boxed-recipes text-center">
            @include('widgets.recipiescard_list', ['animate' => 'yes'])
        </div>
    </div>


</div>











