<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 25.12.15
 * Time: 22:14
 */?>

        <!--single post-->
<article class="post-single">
    <div class="post-visuals">
        <div class="wrapper-post-slider">
            <div class="post-slider">
                <div>
                    <a href="{{ URL::to('blog/'.$blogpost->id) }}">
                        <img src="{{ URL::to('imgpref/' . $blogpost->img).'/846/341' }}" alt="image"/>
                    </a>
                </div>
                {{--<div>--}}
                    {{--<a href="#">--}}
                        {{--<img src="images/temp-images/post-image-2.jpg" alt="image"/>--}}
                    {{--</a>--}}
                {{--</div>--}}
            </div>
            {{--<span class="arrow-nav left-arrow"><i class="fa fa-angle-left"></i></span>--}}
            {{--<span class="arrow-nav right-arrow"><i class="fa fa-angle-right"></i></span>--}}
        </div>
    </div>
    <div class="post-contents">
        <div class="post-contents-inner">
            <h2><a href="{{ URL::to('blog/'.$blogpost->id) }}">{{ $blogpost->title }}</a></h2>
            <ul class="news-post-meta post-meta">
                <li class="calendar">{{ $blogpost->created_at->format('d/m/Y') }}</li>

                <li class="author"><a href="{{ URL::to('/user/' . $blogpost->user_id ) }}">{{ $blogpost->user->first_name }}</a></li>

                <li class="comments">Комментариев: {{ $blogpost->comments->count() }}</li>
            </ul>
            {!! str_limit($blogpost->text, $limit = 350, $end = '...') !!}
            <br><br>
            <a class="read-more-bordered" href="{{ URL::to('blog/'.$blogpost->id) }}">Подробнее</a>
        </div>
    </div>
</article>
<!--single post-->
