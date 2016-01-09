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
            <img src="{{ URL::to('imgpref/' . $recipie->img).'/263/207'  }}" alt="image">
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
            @if($type=='rating') @include('widgets._ratingBox') @endif
            @if($type=='view')
               Просмотров: {{ $recipie->views  }}
            @endif
            @if($type=='calendar')
                <ul class="post-meta">
                    <li class="calendar">{{ $recipie->created_at->format('d/m/Y') }}</li>
                </ul>
            @endif

        </div>
    </div>
</div>
