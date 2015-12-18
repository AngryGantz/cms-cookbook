<?php

Admin::model('App\MarkerGroup')->title('Группы маркеров')->display(function ()
{

	$display = AdminDisplay::datatables();
	$display->with('markers');
	$display->filters([

	]);

	$display->columns([
		Column::string('name')->label('Имя'),
		Column::string('longname')->label('Длинное имя'),
		Column::image('ico')->label('Иконка'),
		Column::string('metakey')->label('Meta Keywords'),
		Column::string('metadesk')->label('Meta Description'),
		Column::lists('markers.name')->label('Маркеры'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('name', 'Имя')->required(),
		FormItem::text('longname', 'Длинное имя'),
		FormItem::image('ico', 'Иконка'),
		FormItem::text('metakey', 'Meta Keywords'),
		FormItem::text('metadesk', 'Meta Description'),
		FormItem::multiselect('markers', 'Маркеры')->model('App\Marker')->display('name'),
	]);
	return $form;
});