{{-- $mgoups - array All Grups Marker --}}
{{-- {!! Form::open(array('class' => 'form-horizontal')) !!} --}}
{!! Form::open(array('enctype' => 'multipart/form-data')) !!}
	
	{{-- Name Recipie --}}
	<div class="{!! $errors->has('title') ? ' has-error' : null !!}">
		<label for="title">Название</label>
    	{!! Form::text('title', null, array('placeholder' => '')) !!}
    	<p class="help-block">{!! $errors->first('title') !!}</p>
	</div>
	{{-- Annotacie --}}
	<div class="{!! $errors->has('note') ? ' has-error' : null !!}">
		<label for="note">Аннотация</label>
    	{!! Form::textarea('note', null, array('placeholder' => '', 'rows' => '3')) !!}
    	<p class="help-block">{!! $errors->first('note') !!}</p>
	</div>
	{{-- Annotacie --}}
	<div class="{!! $errors->has('text') ? ' has-error' : null !!}">
		<label for="text">Описание</label>
    	{!! Form::textarea('text', null, array('placeholder' => '', 'rows' => '7')) !!}
    	<p class="help-block">{!! $errors->first('text') !!}</p>
	</div>
	
	{{-- Steps of cook --}}
    <fieldset class="ingredient-set">
		    	<div class="{!! $errors->has('steps') ? ' has-error' : null !!}">
			        <label for="steps">Этапы приготовления</label>
			        <ul class="list-sortable steps">
			            <li>
			                <div class="add-fields">
					    		<div class="col-sm-2">
					    			<div class="upload">
									    <div class="file-preview"></div>
									    <input type="file" name="imgstep[]" style="display: none;" >
									</div>
					    		</div>
								{{-- <span class="handler-list"><i class="fa fa-arrows"></i></span> --}}
                    			{!! Form::textarea('steps[]', null, array('placeholder' => '', 'rows' => '3', 'cols' => '30', 'id' => 'steps1')) !!}
                  				<span class="del-list"><i class="fa fa-trash"></i></span>
			                </div>
			            </li>
			        </ul>
			         <span class="add-button add-steps">
			            <i class="fa fa-plus"></i>
			        </span>
			        <p class="help-block">{!! $errors->first('steps') !!}</p>
			    </div>
    </fieldset>


	{{-- Select marker from Group markers --}}
    <div class="row">
		@foreach ($mgroups as $mgroup)
	        <div class="col-sm-6">
	            <label for="recipe-type">{{ $mgroup->name }}</label>
	            <select name="recipe-type[]" id="recipe-type" class="advance-selectable">		    	
		            <option value="0" selected="selected">None</option>
			    	@foreach ($mgroup->markers as $marker)
		                <option value="{{ $marker->id }}">{{ $marker->name }}</option>
			    	@endforeach
	            </select>
	        </div>
		@endforeach        
    </div>
	<div class="form-group">
		<div class="col-sm-8 col-sm-push-4">
			{!! Form::submit('Отправить', array('class' => 'btn btn-primary')) !!}
			{!! Form::reset('Сброс', array('class' => 'btn btn-default')) !!}
		</div>
	</div>

{!! Form::close() !!}