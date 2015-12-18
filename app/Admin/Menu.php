<?php

Admin::model(\App\Models\Menu::class)->title('Меню')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with('menuitems');
	$display->filters([

	]);
	$display->columns([
		Column::string('name')->label('Name'),
		Column::string('id')->label('Id'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('name', 'Название'),
//		FormItem::multiselect('menuitems', 'Пункты меню')->model('App\Models\Menuitem')->display('name'),
	]);
	return $form;
});