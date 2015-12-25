<?php

Admin::model('Lanz\Commentable\Comment')->title('Комментарии')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	$display->columns([
			Column::string('body')->label('Комментарий'),
			Column::datetime('created_at'),
	]);
	return $display;
})->createAndEdit(function ($id)
{
	if (is_null($id))
	{
		return null;
	}
	$form = AdminForm::form();
	$form->items([
//		FormItem::text('title', 'Title'),
//		FormItem::text('parent_id', 'Parent'),
//		FormItem::text('lft', 'Lft'),
//		FormItem::text('rgt', 'Rgt'),
//		FormItem::text('depth', 'Depth'),
//		FormItem::text('commentable_id', 'Commentable'),
//		FormItem::text('commentable_type', 'Commentable Type'),
		FormItem::select('user_id', 'Автор')->model('App\User')->display('first_name'),
		FormItem::ckeditor('body', 'Комментарий'),
	]);
	return $form;
});