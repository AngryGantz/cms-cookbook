<?php

Admin::model(\App\Models\MenuitemType::class)->title('Типы пунктов меню')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);

	$display->columns([
		Column::string('name')->label('Название типа'),
		Column::string('id')->label('Id'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('name', 'Название типа'),
	]);
	return $form;
});