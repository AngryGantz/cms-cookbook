<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 25.12.15
 * Time: 19:11
 */?>

<div class="widget widget-overlay">
@if( $advert = AdvertHelper::getRandomAdvertByPlace($pos) )
    {{--@if($advert['title'])--}}
        {{--<h4>{{ $advert['title'] }}</h4>--}}
    {{--@endif--}}
    @if($advert['img'])
        <a href="{{$advert['imglink']}}">
            <figure>
                <img src="{{ URL::to('imgpref/' . $advert['img']).'/261/261'  }}" alt="banner"/>
                @if($advert['title'])
                    <figcaption>{{ $advert['title'] }}</figcaption>
                @endif
            </figure>
        </a>
    @endif
    @if($advert['text'])
        {!!  $advert['text'] !!}
    @endif
@endif
</div>
