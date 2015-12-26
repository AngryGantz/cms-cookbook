<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 20.12.15
 * Time: 21:29
 */?>

<div class="recipe-single animated wow flipInY">
    <div class="image">
        <a href="{{ URL::to('/recipie/' . $recipie->id) }}">
            <img src="{{ URL::to('/imager/fullpath/' . basename($recipie->img)).'/263/207'  }}" alt="image">
        </a>
    </div>
    <div class="outer-detail">
        <div class="detail">
            <h3>
                <a href="{{ URL::to('/recipie/' . $recipie->id) }}">
                    {{ $recipie->title  }}
                </a>
            </h3>
            <div class="short-separator"></div>
            @include('widgets._ratingBox')
        </div>
    </div>
</div>
