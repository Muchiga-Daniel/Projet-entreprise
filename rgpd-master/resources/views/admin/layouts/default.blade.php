<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <title>@include('admin.layouts.partials._title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

    <style type="text/css">
        body 
        {
            /*background-color: #343a40;*/
            padding-top: 70px;
        }
    </style>

    @yield('css')

  </head>
  <body>
    <h2>@include('admin.layouts.partials._title')</h2>

    @include('admin.layouts.partials._nav')

    @if(session()->has('alert'))
        <div class="container py-1">
            <div class="alert alert-{!! session('alert')['class'] !!} alert-dismissible fade show" role="alert">
                {!! session('alert')['message'] !!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        </div>
    @endif

    @yield('content')

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    <script defer src="{{ URL::asset('js/rgpd.js') }}" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.3/js/all.js" crossorigin="anonymous"></script>

    @yield('script')

  </body>
</html>