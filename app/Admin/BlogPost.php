<?php

Admin::model('App\Models\BlogPost')->title('Статьи блога')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with('user', 'statusName');
	$display->filters([

	]);
	$display->columns([
		Column::string('id')->label('Id'),
		Column::string('title')->label('Заголовок'),
		Column::datetime('created_at')->label('Создан')->format('d.m.Y H:i'),
		Column::string('user.first_name')->label('Автор'),
		Column::string('statusName.name')->label('Статус'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('title', 'Заголовок'),
		FormItem::image('img', 'Изображение'),
		FormItem::text('slug', 'Slug'),
		FormItem::select('user_id', 'Автор')->model('App\User')->display('first_name')->defaultValue(1),
		FormItem::select('status', 'Статус')->model('App\Models\PostStatus')->display('name')->defaultValue(1),
		FormItem::text('metakey', 'Metakey'),
		FormItem::text('metadesc', 'Metadesc'),
//		FormItem::text('tagNames', 'Metadesc'),
		FormItem::ckeditor('text', 'Текст статьи'),


		FormItem::custom('newtags', 'sssssssssss')->display(function ($instance)
		{
			return view('admin.formitem_tags', ['instance' => $instance]);
		})->callback(function ($instance)
		{
			$instance->retag($_POST['newtags']);
		})










	]);
	return $form;
});