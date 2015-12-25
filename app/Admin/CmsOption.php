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
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
//		FormItem::text('name', 'Name'),
		FormItem::text('value', 'Value'),
	]);
	return $form;
})->delete(function ($id)
{
	if (in_array($id, [1,2,3]))
	{
		return null;
	}
	else { return 1;}
});