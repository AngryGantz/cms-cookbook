<?php

Admin::model('\App\Step')->title('Шаги рецептов')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	$display->columns([
		Column::string('text')->label('Text'),
		Column::string('img')->label('Img'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('post_id', 'Post'),
		FormItem::text('img', 'Img'),
		FormItem::ckeditor('text', 'Text'),
	]);
	return $form;
});