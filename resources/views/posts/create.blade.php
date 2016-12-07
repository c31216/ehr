@extends('main')

@section('stylesheets')

	{!! Html::style('css/parsley.css') !!}
	{!! Html::style('css/date-picker.css') !!}

@endsection

@section('content')
	    <div class="row">	
	    
	    	<div class="col-md-6">
	    	<h1>Add Record</h1>
			
	    		{!! Form::open(['route' => 'posts.store','data-parsley-validate' => '']) !!}

			    <div class="row">
				  <div class="form-group col-xs-5 col-lg-7">

				    {{ Form::label('pat_uname', "Patient's Username") }}
				    {{ Form:: text('pat_uname', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '255'])}}

				  </div>
			    </div>

			    <div class="row">
				  <div class="form-group col-xs-5 col-lg-7 ">

				    {{ Form::label('pat_pass', "Patient's Password") }}
				    {{ Form::text('pat_pass', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '255']) }}

				  </div>
			    </div>

			     <div class="row">
				  <div class="form-group col-xs-5 col-lg-7">

				    {{ Form::label('pat_fname', "Patient's First Name") }}
				    {{ Form::text('pat_fname', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '255']) }}

				  </div>
			    </div>

			     <div class="row">
				  <div class="form-group col-xs-5 col-lg-7">

				    {{ Form::label('pat_lname', "Patient's Last Name") }}
				    {{ Form::text('pat_lname', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '255']) }}

				  </div>
			    </div>

			     <div class="row">
				  <div class="form-group col-xs-5 col-lg-7">

				    <label for="pat_bdate">Date Of Birth</label>
				    {{ Form::date('pat_bdate', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '255','id' => 'dateofbirth']) }}
						
				  </div>
			    </div>
				
			    <div class="row">

			    	{{ Form::submit('Add Record', ['class' => 'btn btn-success']) }}

			    </div>

			{!! Form::close() !!}

	    	</div>
	    </div>
@endsection


@section('scripts')
	{!! Html::script('js/parsley.min.js') !!}
@endsection