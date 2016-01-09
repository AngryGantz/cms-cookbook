<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 19.12.15
 * Time: 11:29
 */?>


<li>
    <div class="step-single">
        <div class="sssstep-image">
              <img src="{{ URL::to('imgpref/' . $step->img .'/220/162')  }}"  style="margin: 0px 10px 10px 0px;" align="left"  >
        </div>
        <div class="ssssstep-detail">
            <h3>Шаг {{ $count }}.</h3>
            <p>
                {!!  $step->text  !!}
            </p>
        </div>
    </div>
    <div class="clear"></div>
</li>

