<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 25.12.15
 * Time: 2:27
 */?>

<?php $rand = \App\Post::getRandomRecipie(); ?>

<div class="slide-detail-inner">
    <h2><a href="{{URL::to('recipie/'.$rand->id)}}">{{$rand->title}}</a></h2>

    <div class="short-separator"></div>
    @include('widgets._ratingBox', ['recipie' => $rand])
    <p>
        {!!  str_limit($rand->text, $limit = 200, $end = '...')  !!}
    </p>
    <a class="read-more-bordered" href="{{URL::to('recipie/'.$rand->id)}}">Подробнее</a>
</div>
