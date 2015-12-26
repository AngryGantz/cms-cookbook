<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 18.12.15
 * Time: 23:43
 */?>


<div class="rating-box">
    @if ($recipie->getRating())
        @for ($i = 0; $i < $recipie->getRoundRating(); $i++)
            @include ('widgets._rating-icon')
        @endfor
        <span class="rating-figure">({{ $recipie->getRating() }} / 5)</span>
    @else
        <span class="rating-figure">Нет рейтинга</span>
    @endif
</div>





