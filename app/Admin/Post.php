<?php
use \App\Post;
Admin::model('App\Post')->title('')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with('steps', 'markers', 'user');
	$display->filters([

	]);
	$display->columns([
		Column::image('img'),
		Column::string('title')->label('Заголовок'),
		Column::string('postStatus.name')->label('Статус'),
		Column::datetime('created_at')->label('Создан')->format('d.m.Y'),

		// Column::string('note')->label('Note'),
	]);
	return $display;
})->create(function ()
{

	$form = AdminForm::tabbed();
	$form->instance(['enctype' => 'multipart/form-data']);
	$form->items([
			'Оcновные поля' => [
					FormItem::columns()->columns([
						[
							FormItem::text('title', 'Заголовок'),
//							FormItem::select('user_id', 'Автор')->model('App\User')->display('first_name')->defaultValue(Sentinel::check()->getUserId()),
							FormItem::select('user_id', 'Автор')->model('App\User')->display('first_name')->defaultValue(1),
							FormItem::image('img', 'Изображение'),
							FormItem::select('postStatus_id', 'Статус')->model('App\Models\PostStatus')->display('name')->defaultValue(1),
						],
						[
							FormItem::text('timecook', 'Время приготовления'),
							FormItem::text('calory', 'Время подготовки'),
							FormItem::text('metakey', 'Metakey'),
							FormItem::text('metadesc', 'Metadesc'),
							FormItem::text('slug', 'Slug (Если оставить пустым гененрируется при сохранении)'),
						],
					]),
						FormItem::multiselect('markers', 'Маркеры')->model('App\Marker')->display('name'),
						FormItem::ckeditor('note', 'Ингридиенты'),
						FormItem::ckeditor('text', 'Описание'),
			],
			'Этапы приготовления' => [

					FormItem::custom()->display(function ($instance)
					{
						$steps = null;
						if ( $instance->id ) {
							$steps = Post::find($instance->id)->steps;
						}
					    return view('admin.steps', ['instance' => $instance, 'steps' => $steps]);
					})->callback(function ($instance)
					{

//						$instance->myField = 12;
					}),
			],
	]);
	return $form;
})->edit(function ()
{

	$form = AdminForm::tabbed();
	$form->instance(['enctype' => 'multipart/form-data']);
	$form->items([
			'Оcновные поля' => [
					FormItem::columns()->columns([
							[
									FormItem::text('title', 'Заголовок'),
									FormItem::select('user_id', 'Автор')->model('App\User')->display('first_name'),
									FormItem::image('img', 'Изображение'),
									FormItem::select('postStatus_id', 'Статус')->model('App\Models\PostStatus')->display('name'),
							],
							[
									FormItem::text('timecook', 'Время приготовления'),
									FormItem::text('calory', 'Время подготовки'),
									FormItem::text('metakey', 'Metakey'),
									FormItem::text('metadesc', 'Metadesc'),
									FormItem::text('slug', 'Slug (Если оставить пустым гененрируется при сохранении)'),
							],
					]),
					FormItem::multiselect('markers', 'Маркеры')->model('App\Marker')->display('name'),
					FormItem::ckeditor('note', 'Ингридиенты'),
					FormItem::ckeditor('text', 'Описание'),
			],
			'Этапы приготовления' => [

					FormItem::custom()->display(function ($instance)
					{
						$steps = null;
						if ( $instance->id ) {
							$steps = Post::find($instance->id)->steps;
						}
						return view('admin.steps', ['instance' => $instance, 'steps' => $steps]);
					})->callback(function ($instance)
					{

//						$instance->myField = 12;
					}),
			],
	]);
	return $form;
});


;



