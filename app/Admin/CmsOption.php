<?php

Admin::model('App\Models\CmsOption')->title('Общие настройки')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	$display->columns([
		Column::string('name')->label('Name'),
		Column::string('value')->label('Value'),
			Column::string('id')->label('Id'),
	]);
	return $display;
})->create(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('name', 'Название опции (Используется в коде)'),
		FormItem::text('value', 'Значение'),
	]);
	return $form;
})->edit(function () {
	$form = AdminForm::form();
	$form->items([
		FormItem::text('name', 'Name'),
			FormItem::text('value', 'Value'),
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