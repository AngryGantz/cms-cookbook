<?php

Admin::model('App\Models\Advert')->title('Рекламные блоки')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([
		Filter::field('active')->title('Вкл')->alias('ddddd'),
	]);
	$display->columns([
		Column::string('id')->label('Id'),
		Column::string('name')->label('Название'),
		Column::string('place')->label('Место'),
		Column::string('active')->label('Включен'),
		Column::image('img')->label('Img'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::columns()->columns([
				[
						FormItem::text('name', 'Название (только для админа)'),
				],
				[
						FormItem::checkbox('active', 'Включен'),
				],
		]),
			FormItem::columns()->columns([
					[
							FormItem::select('place', 'Место посадки')->enum(['top1', 'aside1', 'aside2', 'foot_script']),
					],
					[

					],
			]),


		FormItem::columns()->columns([
			[
				FormItem::text('title', 'Заголовок'),
			],
			[
				FormItem::checkbox('show_title', 'Показывать'),
			],
		]),
		FormItem::columns()->columns([
				[
						FormItem::image('img', 'Изображение'),
				],
				[
						FormItem::checkbox('show_img', 'Показывать'),
						FormItem::text('imglink', 'Ссылка'),
				],
		]),

			FormItem::columns()->columns([
					[
							FormItem::textarea('text', 'Содержимое'),
					],
					[
							FormItem::checkbox('show_text', 'Показывать'),
					],
			]),
	]);
	return $form;
});