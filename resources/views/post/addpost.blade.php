@extends('template')
@section('body')
<div class="recipes-home-body inner-page">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-lg-9">
				<div class="recipe-set submit-recipe-set">
					<h2>Добавление рецепта</h2>
					<p>
						Food Фууд Реципие Recipe theme include a Recipe Submit Template. It allow users to submit a recipe with featured image and related details. A user should be logged in to submit a recipe.
					</p>
					<div class="submit-recipe-form">
						@include('post._addform')
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop