<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy Pivovarov aka AngryDeer http://studioweb.pro
 * Date: 11.12.15
 * Time: 2:36
 */?>

	@extends('admin.inneradmin_template')
	{{-- Steps of cook --}}
	@section('body')	
	    <fieldset class="ingredient-set">
			    	<div class="{!! $errors->has('steps') ? ' has-error' : null !!}">
				        <label for="steps">Этапы приготовления</label>
				        <ul class="list-sortable steps">

							@if (! is_null($steps))
								@foreach ($steps as $step)
						            <li>
						                <div class="add-fields">
								    		<div class="col-sm-2">
								    			<div class="upload">
												    {{--<div class="file-preview"><img src="{{ URL::to('/imager/fullpath/' . basename($step->img)).'/100/100'  }}" alt=""></div>--}}
													<div class="file-preview">
														<img src="{{ URL::to('imgpref/'.$step->img. '/100/100') }}" alt="">
													</div>
													<input type="file" name="imgstep[]" style="display: none;" >
												</div>
								    		</div>
											{{-- <span class="handler-list"><i class="fa fa-arrows"></i></span> --}}
											{!! Form::hidden('imgnamestep[]', $step->img ) !!}
											{!! Form::hidden('idstep[]', $step->id ) !!}
			                    			{!! Form::textarea('steps[]', $step->text , array( 'rows' => '3', 'cols' => '30', 'id' => 'steps1')) !!}
			                  				<span class="del-list"><i class="fa fa-trash"></i></span>
						                </div>
						            </li>
								@endforeach
							@elseif (! is_null(old('steps.0')))
								@foreach (old('steps') as $step)
									<li>
										<div class="add-fields">
											<div class="col-sm-2">
												<div class="upload">
													<div class="file-preview"></div>
													<input type="file" name="imgstep[]" style="display: none;" >
												</div>
											</div>
											{{-- <span class="handler-list"><i class="fa fa-arrows"></i></span> --}}
											{{--{!! Form::hidden('imgnamestep[]', $step->img ) !!}--}}
											{{--{!! Form::hidden('idstep[]', $step->id ) !!}--}}
											{{--{!! Form::textarea('steps[]', $step , array( 'rows' => '3', 'cols' => '30', 'id' => 'steps1')) !!}--}}
											<textarea name="steps[]" id="steps1" cols="30" rows="3">{{ $step }}</textarea>
											<span class="del-list"><i class="fa fa-trash"></i></span>
										</div>
									</li>
								@endforeach
							@else
						            <li>
						                <div class="add-fields">
								    		<div class="col-sm-2">
								    			<div class="upload">
												    <div class="file-preview"></div>
												    <input type="file" name="imgstep[]" style="display: none;" >
												</div>
								    		</div>
											<textarea name="steps[]" id="steps1" cols="30" rows="3"></textarea>
			                    			{{--{!! Form::textarea('steps[]', null, array('placeholder' => '', 'rows' => '3', 'cols' => '30', 'id' => 'steps1')) !!}--}}
			                  				<span class="del-list"><i class="fa fa-trash"></i></span>

						                </div>
						            </li>
							@endif

				        </ul>
				         <span class="add-button add-steps">
				            <i class="fa fa-plus"></i>
				        </span>
				        <p class="help-block">{!! $errors->first('steps') !!}</p>
				    </div>
	    </fieldset>
	@stop
