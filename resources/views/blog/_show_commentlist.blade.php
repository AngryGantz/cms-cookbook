<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 26.12.15
 * Time: 0:26
 */?>

<ul id="comments-list" class="comments-list">
    @foreach($comments as $comment)
    <?php $commentAutor = $comment->user; ?>
    <li>

        <div class="comment-inner">
            <div class="gravatar">
                <a href="{{ URL::to('/user/' . $commentAutor->id ) }}">
                    <img src="{{ URL::to('/imager/fullpath/' . basename($commentAutor->avatar) . '/83/10000' ) }}" alt="Аватар"/>
                </a>
            </div>
            <div class="detail">
                <h6><a href="{{ URL::to('/user/' . $commentAutor->id ) }}">{{ $commentAutor->first_name }}</a></h6>
                <span class="comment-date"><i class="fa fa-calendar"></i> {{ $comment->created_at->format('d.m.Y - H:i') }} </span>
                <p>
                   {!!$comment->body !!}
                </p>
<!--                <a class="comment-reply" href="#"><i class="fa fa-mail-reply-all"></i> reply</a>-->
            </div>
        </div>
    </li>
    @endforeach
</ul>
