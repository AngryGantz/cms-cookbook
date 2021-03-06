<?php

//Admin::menu()->url('/')->label('Start page')->icon('fa-dashboard');
Admin::menu(\App\Post::class)->label('Рецепты')->icon('fa-book');
Admin::menu(\App\Models\PostStatus::class)->label('Статусы поста')->icon('fa-bookmark-o');
Admin::menu(\App\Marker::class)->icon('fa-paperclip');
Admin::menu(\App\MarkerGroup::class)->icon('fa-list-ul');

Admin::menu(Lanz\Commentable\Comment::class)->label('Комментарии')->icon('fa-comments-o');
Admin::menu(\App\Models\BlogPost::class)->label('Статьи блога')->icon('fa-file-powerpoint-o');
Admin::menu(\App\Models\Advert::class)->label('Рекламные блоки')->icon('fa-eye');
Admin::menu(\App\Models\CmsOption::class)->label('Общие настройки')->icon('fa-cogs');


Admin::menu()->label('Пользователи')->icon('fa-users')->items(function ()
{
    Admin::menu(Cartalyst\Sentinel\Users\EloquentUser::class)->label('Юзеры')->icon('fa-user');
    Admin::menu(App\Permit::class)->label('Права')->icon('fa-key');
    Admin::menu(App\Role::class)->label('Роли')->icon('fa-graduation-cap');

});



//Admin::menu()->label('Меню')->icon('fa-bars')->items(function ()
//{
//    Admin::menu(\App\Models\Menu\Menu::class)->icon('fa-bars')->label('Меню');
//    Admin::menu(\App\Models\Menuitem\Menuitem::class)->icon('fa-caret-square-o-down ')->label('Пункты меню');
//    Admin::menu(\App\Models\MenuitemType\MenuitemType::class)->icon('fa-file-code-o')->label('Типы пунктов меню');
//});