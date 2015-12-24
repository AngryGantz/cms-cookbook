<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 20.12.15
 * Time: 1:23
 */?>

<div class="rating-box">
        <span class="rating-figure">Выставить рейтинг: &nbsp; &nbsp;</span>
        @for ($i = 1; $i < 6; $i++)
            <a style="cursor: pointer;" title="Поставить рейтинг {{ $i }}"  onclick="setrate( {{ $i }} , {{ $recipie->id }} )">
                @include ('widgets._rating-icon')
            </a>
        @endfor
        <p id="setrateanswer"></p>
        {{--<span class="rating-figure">({{ $raiting }} / 5)</span>--}}
</div>


