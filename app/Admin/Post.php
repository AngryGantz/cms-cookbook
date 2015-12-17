<?php
use \App\Post;
Admin::model('App\Post')->title('')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with('steps', 'markers', 'user');
	$display->filters([

	]);
	$display->columns([
		Column::string('title')->label('Title'),
		// Column::string('note')->label('Note'),
	]);
	return $display;
})->createAndEdit(function ()
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
						],
						[
							FormItem::text('timecook', 'Время приготовления'),
							FormItem::text('calory', 'Калории'),
							FormItem::text('metakey', 'Metakey'),
							FormItem::text('metadesc', 'Metadesc'),
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
					    $instance->myField = 12;
					}),
			],
	]);
	return $form;
});



