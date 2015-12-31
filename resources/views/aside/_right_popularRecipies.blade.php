<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 21.12.15
 * Time: 2:48
 *
 * Show $num recipies headers with max views
 *
 */?>

<!--popular recipes widget-->
<?php $recipies = \App\Post::getPopularRecipies($num) ?>
<div class="widget latest-news-widget">
    <h2>Популярные рецепты</h2>
    <ul>
        @foreach($recipies as $recipie)
            <li>
                <div class="thumb">
                    <a href="{{ URL::to('/recipie/' . $recipie->id) }}">
                        <img src="{{ URL::to('imgpref/' . $recipie->img).'/66/59'  }}" alt="thumbnail"/>
                    </a>
                </div>
                <div class="detail">
                    <a href="{{ URL::to('/recipie/' . $recipie->id) }}">{{ $recipie->title  }}</a>
                    <span class="post-date">{{ $recipie->views }} просмотров</span>
                </div>
            </li>
        @endforeach
    </ul>
</div>
<!--popular recipes widget ends-->

