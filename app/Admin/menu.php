<?php

Admin::menu()->url('/')->label('Start page')->icon('fa-dashboard');
Admin::menu(\App\Post::class)->label('Рецепты')->icon('fa-book');
Admin::menu(\App\Models\PostStatus\PostStatus::class)->label('Статусы поста')->icon('fa-bookmark-o');
Admin::menu(\App\Marker::class)->icon('fa-paperclip');
Admin::menu(\App\MarkerGroup::class)->icon('fa-list-ul');
Admin::menu(\App\User::class)->label('Пользователи')->icon('fa-user');


Admin::menu()->label('Меню')->icon('fa-bars')->items(function ()
{
    Admin::menu(\App\Models\Menu\Menu::class)->icon('fa-bars')->label('Меню');
    Admin::menu(\App\Models\Menuitem\Menuitem::class)->icon('fa-caret-square-o-down ')->label('Пункты меню');
    Admin::menu(\App\Models\MenuitemType\MenuitemType::class)->icon('fa-file-code-o')->label('Типы пунктов меню');
});