<?php

Admin::model('App\MarkerGroup')->title('Группы маркеров')->display(function ()
{

	$display = AdminDisplay::datatables();
	$display->with('markers');
	$display->filters([

	]);

	$display->columns([
		Column::string('name')->label('Имя'),
		Column::string('id')->label('ID'),
		Column::lists('markers.name')->label('Маркеры'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('name', 'Имя')->required(),
		FormItem::checkbox('showadd', 'Показывать в форме добавления рецепта'),
//		FormItem::text('longname', 'Длинное имя'),
		FormItem::image('ico', 'Иконка'),
		FormItem::text('metakey', 'Meta Keywords'),
		FormItem::text('metadesk', 'Meta Description'),
		FormItem::multiselect('markers', 'Маркеры')->model('App\Marker')->display('name'),
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