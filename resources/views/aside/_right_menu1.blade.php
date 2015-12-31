<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 20.12.15
 * Time: 19:50
 *
 * List markers from MarkerGroup by $groupid
 * $groupid must be argument in call
 *
 */?>

<!--recipes search widget-->
<div class="widget recipe-search">
    <div class="category-list">
        <ul>
            <?php $MarkerGroup = \App\MarkerGroup::find($groupid);  ?>
            @foreach($MarkerGroup->markers as $marker)
                <li>
                    <a href="{{ URL::to('/menu/' . $marker->id) }}">{{$marker->name}}</a>
                    <div class="list-icons">
                        <img src="{{ URL::to('imgpref/' . $marker->ico . '/42/42' ) }}" alt="">
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
<!--recipes search widget ends-->

