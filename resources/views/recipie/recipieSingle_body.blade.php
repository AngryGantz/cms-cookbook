<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 23.12.15
 * Time: 0:44
 */?>


{{--<script type="text/javascript">(function(w,doc) {--}}
        {{--if (!w.__utlWdgt ) {--}}
            {{--w.__utlWdgt = true;--}}
            {{--var d = doc, s = d.createElement('script'), g = 'getElementsByTagName';--}}
            {{--s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;--}}
            {{--s.src = ('https:' == w.location.protocol ? 'https' : 'http')  + '://w.uptolike.com/widgets/v1/uptolike.js';--}}
            {{--var h=d[g]('body')[0];--}}
            {{--h.appendChild(s);--}}
        {{--}})(window,document);--}}
{{--</script>--}}
{{--<div data-background-alpha="0.0" data-buttons-color="#ffffff" data-counter-background-color="#ffffff" data-share-counter-size="10" data-top-button="false" data-share-counter-type="common" data-share-style="7" data-mode="share" data-like-text-enable="false" data-mobile-view="true" data-icon-color="#ffffff" data-orientation="horizontal" data-text-color="#000000" data-share-shape="rectangle" data-sn-ids="fb.vk.tw.ok." data-share-size="20" data-background-color="#ffffff" data-preview-mobile="false" data-mobile-sn-ids="fb.vk.tw.wh.ok.vb." data-pid="1449864" data-counter-background-alpha="1.0" data-following-enable="false" data-exclude-show-more="false" data-selection-enable="true" class="uptolike-buttons" ></div>--}}


{{--<script type="text/javascript">(function(w,doc) {--}}
        {{--if (!w.__utlWdgt ) {--}}
            {{--w.__utlWdgt = true;--}}
            {{--var d = doc, s = d.createElement('script'), g = 'getElementsByTagName';--}}
            {{--s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;--}}
            {{--s.src = ('https:' == w.location.protocol ? 'https' : 'http')  + '://w.uptolike.com/widgets/v1/uptolike.js';--}}
            {{--var h=d[g]('body')[0];--}}
            {{--h.appendChild(s);--}}
        {{--}})(window,document);--}}
{{--</script>--}}
{{--<div data-background-alpha="0.0" data-buttons-color="#ffffff" data-counter-background-color="#ffffff" data-share-counter-size="10" data-top-button="false" data-share-counter-type="common" data-share-style="7" data-mode="share" data-like-text-enable="false" data-mobile-view="true" data-icon-color="#ffffff" data-orientation="horizontal" data-text-color="#000000" data-share-shape="rectangle" data-sn-ids="fb.vk.tw.ok." data-share-size="20" data-background-color="#ffffff" data-preview-mobile="false" data-mobile-sn-ids="fb.vk.tw.wh.ok.vb." data-pid="1449864" data-counter-background-alpha="1.0" data-following-enable="false" data-exclude-show-more="false" data-selection-enable="true" class="uptolike-buttons" ></div>--}}



<div class="recipe-set ">
    <div class="wrapper-detail-contents">
        <div class="single-recipe-detail">
            <div class="wrapper-recipe-heading">
                <div class="heading">
                    <h2>{{ $recipie->title }}</h2>
                    @include ('widgets._ratingBox')
                </div>

                {{-- TODO video for recipie --}}

                {{--<div class="recipe-media">--}}
                {{--<a class="button-dark watch-video swipebox" href="https://vimeo.com/15306847">Watch Video</a>--}}
                {{--</div>--}}

            </div>
            <div class="slider-recipe-detail">
                {{-- Recipie image or slider ( TODO uncomment slider and  change some code in slider block ) --}}
                <div class="wrapper-slider-detail">
                    <img src="{{ URL::to('/imager/fullpath/' . basename($recipie->img)).'/655/454'  }}" alt="{{ $recipie->title }}">
                    {{--@include('recipie._recipieSingle_TopSlider')--}}
                </div>
                {{--<ul class="recipe-specs">--}}
                {{--<li><span class="count">5</span><span class="text">Yield</span></li>--}}
                {{--<li><span class="count">7</span><span class="text">Servings</span></li>--}}
                {{--<li><span class="count">20<span>m</span></span><span class="text">Prep Time</span></li>--}}
                {{--<li><span class="count">30<span>m</span></span><span class="text">Cook Time</span></li>--}}
                {{--<li><span class="count">50<span>m</span></span><span class="text">Ready In</span></li>--}}
                {{--</ul>--}}
                <ul class="recipe-specs">
                    <li>Блок Adsens</li>
                    <li>Блок Adsens</li>
                    <li>Блок Adsens</li>
                    <li>Блок Adsens</li>
                    <li>Блок Adsens</li>
                </ul>
            </div>
        </div>

        <div class="recipe-detail-body">
            <a href="#" target="_blank" class="print-button"><i class="fa fa-print"></i>Распечатать</a>

            {{-- Name some groups of marker and name markers --}}
            <ul class="pre-tags">
                <li>@include ('recipie._onerecipieMarkerGroup', [ 'markerGropupId' => 1 ]) </li>
                <li>@include ('recipie._onerecipieMarkerGroup', [ 'markerGropupId' => 2 ])</li>

            {{-- Recipie cook time --}}

                <li><span>Время приготовления : </span>{{ $recipie->timecook }}</li>
            </ul>

            <div class="separator-post"></div>

            {{-- Recipie main text --}}
            <p>
                {!! $recipie->text !!}
            </p>
            <br/>

            {{-- Recipie ingridients --}}
            <div class="ingredients-checkbox">
                <div class="ingredients">
                    <h3>Ингридиенты</h3>
                    {!! $recipie->note !!}
                </div>
            </div>

            {{-- Recipie steps --}}
            <div class="recipe-steps">
                <h3 class="lined">Этапы приготовления</h3>
                <ul class="steps-list">
                    <?php $i=1 ?>
                    @foreach ($recipie->steps as $step)
                        @include ('recipie._onerecipieStep',[ 'count' => $i ])
                        <?php $i++ ?>
                    @endforeach
                </ul>
            </div>
            <div class="separator-post"></div>

            {{-- Set rating for recipie --}}
            @include('recipie._setRatingBlock')
            @include ('recipie._onerecipieTagsSocial')
            {{--@include ('post._onerecipieTips')--}}
        </div>

        {{-- About autor recipie --}}
        <div class="about-chef">
            <h3 class="lined">Автор</h3>
            <?php $autor = $recipie->user ?>
            <div class="listing">
                <div class="image">
                    <div class="image-inner">
                        <a href="{{ URL::to('/user/' . $autor->id )}}"><img src="{{ URL::to('/imager/fullpath/' . basename($autor->avatar)).'/263/10000'  }}" alt=""></a>
                    </div>
                </div>
                <div class="detail">
                    <div class="row">
                        <div class="col-sm-8">
                            <h4><a href="{{ URL::to('/user/' . $autor->id )}}">{{ $autor->first_name }} {{ $autor->last_name }} </a></h4>
                        </div>
                        <div class="col-sm-4">
                            <ul class="chef-social-links">
                                <li><a href="{{ $autor->social_fb }}"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="{{ $autor->social_twitter }}"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="{{ $autor->social_gplus }}"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="{{ $autor->social_vk }}"><i class="fa fa-vk"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <p>
                        {!!  str_limit($autor->about, 350)  !!}
                    </p>
                    <a href="{{ URL::to('/user/' . $autor->id )}}" class="read-more-angle">Больше информации</a>
                </div>
            </div>
        </div>

        {{-- Related recipies by random marker from this recipie --}}
        <div class="related-recipes">
            <h3 class="lined">Похожие рецепты</h3>
            <div class="boxed-recipes text-center">
                @if ($recipies = $recipie->getRelatedRecipies(3))
                    @include('widgets.recipiescard_list', ['animate' => 'yes'])
                @endif
            </div>
        </div>

        <div id="recipe-comments" class="recipe-comments">
            <h3 class="lined">Комментарии ({{ $recipie->comments->count() }})</h3>
            @include('widgets.comment_list', ['comments' => $recipie->comments ])
        </div>

        @if (Sentinel::check())
            @include('recipie._addComment')
        @else
            <h4>Только зарегистрированные пользователи могут оставлять комментарии</h4>
        @endif

    </div>
</div>
