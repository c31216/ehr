
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>@yield('title')</title>

<!-- css -->
{{ Html::style('css/bootstrap.min.css') }}
{{ Html::style('css/style.css') }}

@yield('stylesheets')


