<?php

Admin::model(\App\Models\PostStatus::class)->title('Статусы постов')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	$display->columns([
		Column::string('name')->label('Название статуса'),
		Column::string('id')->label('Id'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('name', 'Название Статуса'),
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