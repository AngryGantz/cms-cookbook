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
})->delete(function ($id)
{
	if (in_array($id, [1,2,3,4]))
	{
		return null;
	}
	else { return 1;}
});