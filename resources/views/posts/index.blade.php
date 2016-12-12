@extends('main')

@section('stylesheets')

  {!! Html::style('css/parsley.css') !!}
  {!! Html::style('dist/datepicker.css') !!}

@endsection

@section('content')

    {{ Form::label('search', "Search: ") }}
    {{ Form:: text('search', null, ['id'=>'search'])}}
    <style>
      .remove-appearance:disabled{
         outline: none;
         border: none;
         background-color:white;
      }
      .required{
        background-color: #e74c3c;
        color: white;
      }
    </style>
    <hr>
        <h3>Records <a href="#" id="add-record"><img class="add-record-button" src="/img/add_record.png"></a></h3>
        <p>Sort by:</p>
        <form action="">
          <input type="radio" value="lastname" name="noys"> Last name
          <input type="radio" value="firstname" name="noys"> First name
          <input type="radio" value="dateofregistration" name="noys"> Date of Registration
          <input type="radio" value="dateofbirth" name="noys"> Date of Birth
        </form>      
        <br>

        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Date of registration</th>
                <th>Date of birth</th>
                <th>Last name</th>
                <th>First name</th> 
                <th>Weight</th>
                <th>Height</th>
                <th>Age</th>
                <th>Sex</th>
                <th>Name of mother</th>
                <th>Address</th>
                <th>Actions</th>
              </tr>
            </thead>
          
            <tbody id="p_list">
              @foreach($posts as $post)
                <tr>
                  {!! Form::model($post, ['route' => ['posts.update', $post->id ], 'method'=> 'PUT']) !!}
                  <td class="edit charcounter">{{$post->created_at}}</td>
                  <td class="edit charcounter">{{$post->pat_bdate}}</td>
                  <td class="edit charcounter">{{$post->pat_lname}}</td>
                  <td class="edit charcounter">{{$post->pat_fname}}</td>
                  <td class="edit charcounter">{{$post->weight}}</td>
                  <td class="edit charcounter">{{$post->height}}</td>
                  <td class="edit charcounter">{{$post->age}}</td>
                  <td class="edit charcounter">{{$post->sex}}</td>
                  <td class="edit charcounter">{{$post->mother_name}}</td>
                  <td class="edit charcounter">{{$post->address}}</td>
                  {{ Form::submit('Save Changes', ['class' => 'btn btn-success']) }}
                  {!! Form::close() !!}
                  <td>
                    <a href="{{ route('posts.show', $post->id) }}">
                        <p>View Profile</p>
                    </a>
                  </td>

                  <td>
                    <a href="{{ route('checkup.show', $post->id) }}">
                        <p>Check Up</p>
                    </a>
                  </td>

                </tr>
              @endforeach
            </tbody>
            <tbody>
              <tr id="search">

              </tr>
            </tbody>
          </table>
        </div>
        <div class="text-center">
        {!! $posts->links(); !!}
      </div>
    
  <script>  
    var token = '{{ Session::token() }}';
    var url = '{{ route('posts.search') }}';
    var add = '{{ route('posts.store') }}'
    var show = '{{ route('posts.show', $post->id) }}';
    var edit = '{{route('posts.update', $post->id)}}';
    var csrf = '{{ csrf_field() }}';
  </script>
@endsection

@section('scripts')
  {!! Html::script('js/search.js') !!}
  {!! Html::script('js/addrecord.js') !!}
  {!! Html::script('dist/datepicker.js') !!}
  {!! Html::script('js/inlineeditor.js') !!}

@endsection