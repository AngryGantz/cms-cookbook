<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 21.12.15
 * Time: 12:12
 */?>


<!--latest news widget-->
<?php $recipies = \App\Post::getLastRecipies($num) ?>
<div class="widget latest-news-widget">
        <h2>Новые рецепты</h2>
        <ul>
            @foreach($recipies as $recipie)
                <li>
                    <div class="thumb">
                        <a href="{{ URL::to('/recipie/' . $recipie->id) }}">
                            <img src="{{ URL::to('/imager/fullpath/' . basename($recipie->img)).'/66/59'  }}" alt="thumbnail"/>
                        </a>
                    </div>
                    <div class="detail">
                        <a href="{{ URL::to('/recipie/' . $recipie->id) }}">{{ $recipie->title  }}</a>
                        <span class="post-date">{{ $recipie->created_at }} </span>
                    </div>
                </li>
            @endforeach
        </ul>
    </ul>
</div>
<!--latest news widget ends-->


