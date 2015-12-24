<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 20.12.15
 * Time: 12:59
 */?>


<div class="comment-form">
    <h3 class="lined">Оставить комментарий</h3>

    <form method="POST" id="formx" action="javascript:void(null);" onsubmit="addcomment({{ $recipie->id }} )">
        {{--<div class="row">--}}
            {{--<div class="col-md-6">--}}
                {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                {{--<input type="text" name="name" placeholder="Name"/>--}}
            {{--</div>--}}
            {{--<div class="col-md-6">--}}
                {{--<input type="email" name="email" placeholder="Email"/>--}}
            {{--</div>--}}
        {{--</div>--}}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <textarea name="newcomment" id="newcomment" cols="30" rows="10" placeholder="Комментарий"></textarea>
        <button type="submit" class="submit-comment">Отправить</button>
    </form>
    <p id="thanksforcomment"></p>
</div>

