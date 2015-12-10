<?php

Admin::model('\App\Post')->title('Рецепты')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with('markers','steps', 'ingridients');
	$display->filters([

	]);
	$display->columns([
		Column::string('title')->label('Title'),
		Column::string('note')->label('Note'),
		Column::string('text')->label('Text'),
		Column::string('img')->label('Img'),
		Column::string('calory')->label('Calory'),
		Column::string('timecook')->label('Timecook'),
		Column::string('metakey')->label('Metakey'),
		Column::string('metadesc')->label('Metadesc'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('title', 'Title'),
		FormItem::text('user_id', 'User'),
		FormItem::text('img', 'Img'),
		FormItem::text('timecook', 'Timecook'),
		FormItem::text('calory', 'Calory'),
		FormItem::text('metakey', 'Metakey'),
		FormItem::text('metadesc', 'Metadesc'),
		FormItem::ckeditor('note', 'Note'),
		FormItem::ckeditor('text', 'Text'),
	]);
	return $form;
});