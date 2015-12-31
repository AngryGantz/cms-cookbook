<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 25.12.15
 * Time: 23:16
 */?>


<article class="post-single">
    <div class="post-visuals">
            <img src="{{ URL::to('imgpref/' . $blogpost->img).'/846/341' }}" alt="image"/>
    </div>
    <div class="post-contents">
        <div class="post-contents-inner">
            <h2>{{ $blogpost->title }}</h2>
            <ul class="news-post-meta post-meta">
                <li class="calendar">{{ $blogpost->created_at->format('d/m/Y') }}</li>

                <li class="author"><a href="{{ URL::to('/user/' . $blogpost->user_id ) }}">{{ $blogpost->user->first_name }}</a></li>

                <li class="comments">Комментариев: {{ $blogpost->comments->count() }}</li>
            </ul>
            {!! $blogpost->text !!}
            <br/>
            <ul class="post-tags">
                @foreach($blogpost->tags as $tag)
                        <li>
                            <a href="{{ URL::to('/blog/tags/'.$tag->slug)}}">{{$tag->name}}</a>
                        </li>
                @endforeach
            </ul>

            {{--<div class="prev-next-links">--}}
                {{--<a href="#" class="left-arrow"><i class="fa fa-arrow-left"></i> previous post</a>--}}
                {{--<a href="#" class="right-arrow">next post <i class="fa fa-arrow-right"></i></a>--}}
            {{--</div>--}}

            {{--<div class="separator-post"></div>--}}

            {{--<div class="related-posts">--}}
                {{--<h3>related posts</h3>--}}
                {{--<div class="row">--}}
                    {{--<div class="col-sm-4">--}}
                        {{--<div class="related-single">--}}
                            {{--<h4><a href="#">Vitae varius odio dictum--}}
                                    {{--Lorem ipsum</a></h4>--}}
                            {{--<span>in <a href="#">"potato recipe"</a></span>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="col-sm-4">--}}
                        {{--<div class="related-single">--}}
                            {{--<h4><a href="#">Vitae varius odio dictum--}}
                                    {{--Lorem ipsum</a></h4>--}}
                            {{--<span>in <a href="#">"potato recipe"</a></span>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="col-sm-4">--}}
                        {{--<div class="related-single">--}}
                            {{--<h4><a href="#">Vitae varius odio dictum--}}
                                    {{--Lorem ipsum</a></h4>--}}
                            {{--<span>in <a href="#">"potato recipe"</a></span>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

            <div class="separator-post"></div>

            {{-- Autor info--}}
            <div class="post-author">
                <?php $autor = $blogpost->user ?>
                <div class="avatar">
                    <a href="{{ URL::to('/user/' . $autor->id )}}"><img src="{{ URL::to('imgpref/' . $autor->avatar).'/136/10000'  }}" alt="avatar"/></a>
                </div>
                <div class="detail">
                    <ul class="social-icons">
                        <li><a href="{{ $autor->social_fb }}"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="{{ $autor->social_twitter }}"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="{{ $autor->social_gplus }}"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="{{ $autor->social_vk }}"><i class="fa fa-vk"></i></a></li>
                    </ul>
                    <h5><a href="{{ URL::to('/user/' . $autor->id )}}">{{ $autor->first_name }} {{ $autor->last_name }}</a></h5>
                    <span class="type">автор</span>
                    <p>
                        {{ str_limit($autor->about, 200) }}
                    </p>
                </div>
            </div>
            <div class="separator-post"></div>

            {{-- Comments --}}

            <div id="recipe-comments" class="post-comments">
                <h3 class="lined">Комментарии ({{ $blogpost->comments->count() }})</h3>
                @include('blog._show_commentlist', ['comments' => $blogpost->comments ])
            </div>

            @if (Sentinel::check())
                @include('blog._addcomment')
            @else
                <h4>Только зарегистрированные пользователи могут оставлять комментарии</h4>
            @endif

        </div>
    </div>
</article>
<!--single post-->
