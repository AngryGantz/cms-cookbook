<?php
	
Admin::model('App\Marker')->title('Маркеры')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with('markerGroups');
	$display->filters([

	]);
	$display->columns([
		Column::string('name')->label('Имя'),
		Column::lists('markerGroups.name')->label('Входит в группы'),
		Column::image('ico')->label('Иконка'),
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