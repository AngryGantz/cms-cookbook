<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 25.12.15
 * Time: 18:35
 */?>


@if( $advert = AdvertHelper::getRandomAdvertByPlace($pos) )
    @if($advert['title'])
        <h4>{{ $advert['title'] }}</h4>
    @endif
    @if($advert['img'])
        <a href="{{$advert['imglink']}}">
            <img src="{{ URL::to('/imager/fullpath/' . basename($advert['img'])).'/728/97'  }}" alt="banner"/>
        </a>
    @endif
    @if($advert['text'])
        {!!  $advert['text'] !!}
    @endif
@endif
