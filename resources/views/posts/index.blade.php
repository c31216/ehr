@extends('main')

@section('content')

    <h1 class="title-page">ALL RECORDS</h1>

    {{ Form::label('search', "Search: ") }}
    {{ Form:: text('search', null, ['id'=>'search'])}}

    <hr>
    <div class="row">
      <div class="container">         
        <table class="table">
          <thead>
            <tr>
              <th>Name</th>
            </tr>
          </thead>
          <tbody id="p_list">
            @foreach($posts as $post)
              <tr>
                <td>{{ $post->pat_lname .' '. $post->pat_fname }}</td>

                <td>
                  <a href="{{ route('posts.show', $post->id) }}">
                    <div class="link-box">
                      <img src="img/babybottle-icon.png">
                      <p>View status</p>
                    </div>
                  </a>
                </td>

                <td>
                  <a href="{{ route('posts.edit', $post->id) }}">
                    <div class="link-box">
                      <img src="img/edituser-icon.png">
                      <p>Edit</p>
                    </div>
                  </a>
                </td>

                <td>
                  <a href="{{ route('checkup.show', $post->id) }}">
                    <div class="link-box">
                      <img src="img/edituser-icon.png">
                      <p>Profile</p>
                    </div>
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
      </div><!-- end of container-->
    </div>
  <script>  
    var token = '{{ Session::token() }}';
    var url = '{{ route('posts.search') }}';
    var show = '{{ route('posts.show', $post->id) }}';
  </script>
@endsection

@section('scripts')
  {!! Html::script('js/search.js') !!}
@endsection