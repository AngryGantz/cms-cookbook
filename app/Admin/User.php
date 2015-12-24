<?php

/*
 * This is a simple example of the main features.
 * For full list see documentation.
 */

Admin::model('App\User')->title('Пользователи')->display(function ()
{
	$display = AdminDisplay::table();
	$display->columns([
		Column::string('first_name')->label('Имя'),
		Column::string('last_name')->label('Фамилия'),
		Column::string('email')->label('Email'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('first_name', 'Имя')->required(),
		FormItem::text('last_name', 'Фамилия')->required(),
		FormItem::textarea('about', 'О Себе')->required(),
		FormItem::text('email', 'Email')->required()->unique(),
	]);
	return $form;
})->delete(function ($id)
{
	if (in_array($id, [1]))
	{
		return null;
	}
	else { return 1;}
});