<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 20.12.15
 * Time: 21:24
 *
 * Thema has 2 type recipies card - animated for home page and no animated for other pages
 * In call your must defined $animate as "yes" or "no"
 *
 */?>

{{--<div class="boxed-recipes text-center">--}}
@foreach($recipies as $recipie)
    @if ($animate == "yes")  @include('widgets._recipie_card_animated')
        @else  @include('widgets._recipie_card')
    @endif
@endforeach
{{--</div>--}}