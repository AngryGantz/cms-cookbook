<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 25.12.15
 * Time: 23:43
 */?>
<div class="comment-form">
    <h3 class="lined">Оставить комментарий</h3>
    <form method="POST" id="formxblog" action="javascript:void(null);" onsubmit="addcommentblog({{ $blogpost->id }} )">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <textarea name="newcomment" id="newcomment" cols="30" rows="10" placeholder="Комментарий"></textarea>
        <br><br>
        <button type="submit" class="submit-comment">Отправить</button>
    </form>
    <p id="thanksforcomment"></p>
</div>


