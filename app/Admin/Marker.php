<?php
	
Admin::model('App\Marker')->title('Маркеры')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	$display->columns([
		Column::string('name')->label('Имя'),
		Column::string('longname')->label('Длинное имя'),
		Column::image('ico')->label('Иконка'),
		Column::string('metakey')->label('Meta Keywords'),
		Column::string('metadesk')->label('Meta Description'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('name', 'Имя'),
		FormItem::text('longname', 'Длинное имя'),
		FormItem::image('ico', 'Иконка'),
		FormItem::text('metakey', 'Meta Keywords'),
		FormItem::text('metadesk', 'Meta Description'),
	]);
	return $form;
});