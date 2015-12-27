<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 19.12.15
 * Time: 11:29
 */?>


<li>
    <div class="step-single">
        <div class="step-image">
            <a  href="{{ URL::to('/imager/fullpath/' . basename($step->img)).'/1000/10000'  }}"  rel="recipe-slider-1" class="swipebox alinkimgstep">
                <img src="{{ URL::to('/imager/fullpath/' . basename($step->img)).'/220/162'  }} alt="image"/>
            </a>
        </div>
        <div class="step-detail">
            <h3>Шаг {{ $count }}.</h3>
            <p>
                {!!  $step->text  !!}
            </p>
        </div>
    </div>
</li>

