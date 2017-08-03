<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Mijn galerij</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/min/dropzone.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/lightbox.css">

    <script>  var baseUrl = "{{ url('/') }}"; </script>﻿
    @yield('style')
  </head>
  <body>
     @if (Auth::check())
     @include('partials._navbarAuth')
     @else
     @include('partials._navbar')
     @endif

    <div class="container">
        @if(Session::has('flash_message'))
          <div class="alert alert-success">{{Session::get('flash_message')}}</div>
        @endif
        @if(Session::has('flash_error'))
          <div class="alert alert-danger">{{Session::get('flash_error')}}</div>
        @endif
        @yield('content')
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/min/dropzone.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('js/lightbox.js') }}"></script>
    <script type="text/javascript" src="/js/image.js"></script>
    @yield('code')
  </body>
</html>
