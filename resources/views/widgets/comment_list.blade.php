<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 20.12.15
 * Time: 18:55
 *
 * eng (sory, bad)
 *  List of comments. widget must call as
 *  {{--*  @include('comment_list', [ 'comments' => $coleection-comments-by-package-commentable ]) --}}
 *  as examle  $post->comments()
 */?>

<ul id="comments-list">
    @foreach($comments as $comment)
        <?php $commentAutor = $comment->user; ?>
        <li>
            <div class="avatar">
                <a href="{{ URL::to('/user/' . $commentAutor->id ) }}">
                    <img src="{{ URL::to('imgpref/' . $commentAutor->avatar . '/83/10000' ) }}" alt="Аватар"/>
                </a>
            </div>
            <div class="comment">
                <h5><a href="{{ URL::to('/user/' . $commentAutor->id ) }}">{{ $commentAutor->first_name }}</a></h5>
                <span class="time">{{ $comment->created_at->format('d.m.Y - H:i') }}</span>
                <p>
                    {!!  $comment->body  !!}
                </p>
                {{--<a href="#" class="reply-button">Reply</a>--}}
            </div>
        </li>
    @endforeach
</ul>