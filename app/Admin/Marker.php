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
})->create(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::columns()->columns([
			[
					FormItem::text('name', 'Имя'),
					FormItem::image('ico', 'Иконка'),
					FormItem::checkbox('showadd', 'Показывать в форме добавления рецепта')->defaultValue(0),
			],
			[
					FormItem::text('metakey', 'Meta Keywords'),
					FormItem::text('metadesk', 'Meta Description'),
					FormItem::text('slug', 'Slug (если пустое, генерируется реалтайм из имени)')
			],
		]),
	]);
	return $form;
})->edit(function ()
{
	$form = AdminForm::form();
	$form->items([
			FormItem::columns()->columns([
					[
							FormItem::text('name', 'Имя'),
							FormItem::image('ico', 'Иконка'),
							FormItem::checkbox('showadd', 'Показывать в форме добавления рецепта')->defaultValue(0),
					],
					[
							FormItem::text('metakey', 'Meta Keywords'),
							FormItem::text('metadesk', 'Meta Description'),
							FormItem::text('slug', 'Slug (если пустое, генерируется реалтайм из имени)')
					],
			]),
	]);
	return $form;
});