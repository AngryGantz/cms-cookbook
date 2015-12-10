<?php

// Admin::menu()->url('/')->label('Start page')->icon('fa-dashboard');

Admin::menu(\App\Post::class)->label('Рецепты')->icon('fa-book');
Admin::menu(\App\Marker::class)->icon('fa-paperclip');
Admin::menu(\App\MarkerGroup::class)->icon('fa-list-ul');
Admin::menu(\App\User::class)->label('Пользователи')->icon('fa-user');