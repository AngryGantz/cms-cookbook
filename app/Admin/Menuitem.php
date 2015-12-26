<?php

Admin::model(\App\Models\Menuitem::class)->title('Пункты меню')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	$display->columns([
		Column::string('name')->label('Название'),
		Column::string('menu.name'),
		Column::string('id')->label('Id'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
			FormItem::columns()->columns([
				[
					FormItem::text('name', 'Название'),
					FormItem::text('target', 'Ссылка (Если тип НЕ Группа маркеров)'),
					FormItem::select('parent_id', 'Родительский пункт')->defaultValue(0)->model('App\Models\Menuitem')->display('name'),
					FormItem::select('type_id', 'Тип пункта')->model('App\Models\MenuitemType')->display('name'),
				],
				[
					FormItem::select('menu_id', 'В какое меню входит')->model('App\Models\Menu')->display('name'),
					FormItem::select('markerGroup_id', 'Группа маркеров (если тип пункта Группа Маркеров)' )->model('App\MarkerGroup')->display('name'),
					FormItem::select('marker_id', 'Маркер (если тип пункта Маркер)' )->model('App\Marker')->display('name'),
				],
			])
	]);
	return $form;
});