<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 22.12.15
 * Time: 23:54
 */
?>


<div class="body-contents">
    <div class="recipe-set">
        <h2>Топ рецептов по рейтингу</h2>
        <div class="boxed-recipes text-center">
            @include('widgets.recipiescard_list', ['animate' => 'yes', 'recipies' => RecipieHelper::getRatingRecipies(6), 'type' => 'rating'])
        </div>
    </div>

    <div class="recipe-set">
        <h2>Топ рецептов по просмотрам</h2>
        <div class="boxed-recipes text-center">
            @include('widgets.recipiescard_list', ['animate' => 'yes', 'recipies' => RecipieHelper::getPopularRecipies(6), 'type' => 'view'] )
        </div>
    </div>

    <?php $recipie = RecipieHelper::getRandomRecipie() ?>
    <div class="recipe-of-day  wow fadeIn animated" style="visibility: visible; animation-name: fadeIn;">
        <img src="assets/majestic/images/temp-images/recipe-of-the-day.jpg" alt="Recipe of the day">
        <div class="recipe-contents-outer">
            <div class="recipe-contents text-center">
                <div class="recipe-content-inner">
                    <span class="tag">Случайный рецепт</span>

                    <h2>
                        <a href="{{ URL::to('/recipie/' . $recipie->id) }}">{{ $recipie->title  }}</a>
                    </h2>

                    <div class="short-separator"></div>
                    <p>
                        {!!  str_limit($recipie->text, $limit = 150, $end = '...')  !!}
                    </p>
                    <a href="{{ URL::to('/recipie/' . $recipie->id) }}" class="read-more">Подробнее</a>
                </div>
            </div>
        </div>
    </div>

    <div class="recipe-set">
        <h2>Последние рецепты</h2>
        <div class="boxed-recipes text-center">
            @include('widgets.recipiescard_list', ['animate' => 'yes', 'recipies' => RecipieHelper::getLastRecipies(6), 'type' => 'calendar'])
        </div>
    </div>


</div>




