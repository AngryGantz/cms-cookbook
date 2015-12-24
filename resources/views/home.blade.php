@extends('layouts.master')
@section('body')
	@include('widgets.home_slider')
	@include('widgets.mainfilter')
	<div class="recipes-home-body">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-9">
					@include('home.home_body')
				</div>
				<div class="col-md-4 col-lg-3">
					@include('aside.aside')
				</div>
			</div>
		</div>
	</div>
@stop
