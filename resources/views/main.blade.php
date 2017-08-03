<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Josa's Foto's</title>

    @include('partials._head')

    @yield('css')

  </head>
  <body>

   @yield('script')

   @yield('content')

   @include('partials._javascript')

   @yield('code')

  </body>
</html>
