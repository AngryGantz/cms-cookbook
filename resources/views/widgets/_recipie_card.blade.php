<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 20.12.15
 * Time: 21:29
 */?>

<div class="listing">
    <div class="image">
        <a href="{{ URL::to('/recipie/' . $recipie->id) }}">
            <img src="{{ URL::to('/imager/fullpath/' . basename($recipie->img)).'/263/207'  }}" alt="image">
        </a>
    </div>
    <div class="detail">
        <h4>
            <a href="{{ URL::to('/recipie/' . $recipie->id) }}">
                {{ $recipie->title  }}
            </a>
        </h4>
        <div class="meta-listing">
            <ul class="post-meta">
                <li class="author"><a href="{{ URL::to('/user/' . $recipie->user->id ) }}">{{ $recipie->user->first_name }}</a></li>
                <li class="calendar">{{ $recipie->created_at->format('d/m/Y') }}</li>
            </ul>
            @include('widgets._ratingBox')
        </div>
    </div>
</div>
