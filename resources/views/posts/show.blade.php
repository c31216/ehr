@extends('main')

@section('content')

	<div class="row custom-text">

		<div class="col-md-4">
			<h1 class="toddler-name" id="toddler_name">{{ $posts->pat_lname. ', ' . $posts->pat_fname }}</h1>
		</div>

      	<div class="col-md-4">
        	<h1>Vaccine status</h1>
      	</div>

      	<div class="col-md-4">
        	<h1>Date of birth:</h1>
      	</div>

	</div>
    <hr>
    <div class="row" id="vaccines">
       <div class="col-md-4">
        <h1>Birth</h1>
        @foreach($vaccines as $vaccine)
          @if($vaccine->time_period == 'Birth')
            <div class="col-md-5">
              <div class="dropdown">
                 <a data-toggle="dropdown" class="v_dropdown" id="{{$vaccine->id}}" href="#">
                    <p><img class="down-arrow-icon" src="../img/downarrow-icon.png"><span>{{$vaccine->v_abbr}}</span></p>
                 </a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" id="">
                  <a id="option_1"  data-toggle="modal" data-target="#immunized"><li>Already Immunized</li></a>
                  <a id="option_2"  data-toggle="modal" data-target="#reminder"><li>Set Reminder</li></a>
                  <a id="option_3"><li>Reset</li></a>
                </ul>
              </div>
              <br>
            </div>  
            <div class="col-md-7">
              <p><img src="../img/shieldpending-icon.png" id="">
              <span id="">Pending</span></p><br>
            </div>
          @endif
        @endforeach
      </div>

       <div class="col-md-4">
        <h1>Week 6</h1>

        @foreach($vaccines as $vaccine)

          @if($vaccine->time_period == 'Week 6')
            <div class="col-md-5">
              <div class="dropdown">
                 <a data-toggle="dropdown" id="{{$vaccine->id}}" href="#">
                    <p><img class="down-arrow-icon" src="../img/downarrow-icon.png"><span>{{$vaccine->v_abbr}}</span></p>
                 </a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel" >
                  <a id="option_1" class="" data-toggle="modal" data-target="#immunized"><li>Already Immunized</li></a>
                  <a id="option_2" class="" data-toggle="modal" data-target="#reminder"><li>Set Reminder</li></a>
                  <a id="option_3"><li>Reset</li></a>
                </ul>
              </div>
              <br>
            </div>  
            <div class="col-md-7">
              <p><img src="../img/shieldpending-icon.png" id="vaccine_">
              <span >Pending</span></p><br>
            </div>
          @endif
          
        @endforeach

        <!-- Immunized Modal -->
        <div class="modal fade" id="immunized" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Already Immunized</h4>
              </div>
              <div class="modal-body">
                ...
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
        <!-- End Immunized Modal-->
        
        <!-- Reminder Modal -->
        <div class="modal fade" id="reminder" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Set Reminder</h4>
              </div>
              <div class="modal-body">
                ...
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
        <!-- End Reminder Modal-->

        


      </div>
     </div>
@endsection

@section('scripts')
  {!! Html::script('js/immunize.js') !!}
  
@endsection