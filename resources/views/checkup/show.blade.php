@extends('main')

@section('stylesheets')

	{!! Html::style('css/parsley.css') !!}

@endsection

@section('content')
	<h1 class="title-page">Check-Up Checklist of {{$posts->pat_lname.', '.$posts->pat_fname}}</h1>
	<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#add-new">Add New</button>

<!-- Modal -->
<div id="add-new" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Check Up</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['route' => 'checkup.store','data-parsley-validate' => '']) !!}


			    <div class="row">
				  <div class="form-group col-xs-5 col-lg-7">

				    {{ Form::label('description', "Description") }}
				    {{ Form::text('description', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '255']) }}

				  </div>
			    </div>

			    <div class="row">
				  <div class="form-group col-xs-5 col-lg-7">

				    {{ Form::label('doctor', "Doctor") }}
				    {{ Form::text('doctor', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '255']) }}
				    {{ Form::hidden('p_id', $posts->id) }}

				  </div>
			    </div>

			    	{{ Form::submit('Add Record', ['class' => 'btn btn-success']) }}

			{!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- END Modal -->



    <hr>
    <div class="row">
      <div class="container">         
        <table class="table">
          <thead>
            <tr>
              <th>Date</th>
              <th>Description</th>
              <th>Doctor</th>
            </tr>
          </thead>
          <tbody>

			@foreach($checklists as $checklist)

	          <tr>
	            <td><p>{{$checklist->created_at}}</p></td>
	            <td><p>{{$checklist->description}}</p></td>
	            <td><p>{{$checklist->doctor}}</p></td>
	            <td><button type="button" class="btn btn-success" id="edit" data-id="{{$checklist->id}}" data-toggle="modal" data-target="#edit_{{$checklist->id}}">Edit</button></td>

	           </tr>


	           <!-- Edit Modal -->
				<div id="edit_{{$checklist->id}}" class="modal fade" role="dialog">
				  <div class="modal-dialog">

				    <!-- Modal content-->
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
				        <h4 class="modal-title">Edit</h4>
				      </div>
				      <div class="modal-body">
				        {!! Form::model($checklist, ['route' => ['checkup.update', $checklist->id ], 'method'=> 'PUT']) !!}


							    <div class="row">
								  <div class="form-group col-xs-5 col-lg-7">

								    {{ Form::label('description', "Description") }}
								    {{ Form::text('description', $checklist->description, ['class' => 'form-control', 'required' => '', 'maxlength' => '255']) }}


								  </div>
							    </div>

							    <div class="row">
								  <div class="form-group col-xs-5 col-lg-7">

								    {{ Form::label('doctor', "Doctor") }}
								    {{ Form::text('doctor', $checklist->doctor, ['class' => 'form-control', 'required' => '', 'maxlength' => '255']) }}
								    {{ Form::hidden('p_id', $checklist->p_id) }}

								  </div>
							    </div>

							    	{{ Form::submit('Save Changes', ['class' => 'btn btn-success']) }}

							{!! Form::close() !!}
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				      </div>
				    </div>

				  </div>
				</div>
				<!-- END Modal -->

			@endforeach

          </tbody>
        </table>
      </div><!-- end of container-->
    </div>


@endsection


@section('scripts')
	{!! Html::script('js/parsley.min.js') !!}

	<script>
		$("button#edit").click(function(){
			var c_id = $(this).data('id');
			

		});
	</script>

@endsection
