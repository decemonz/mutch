<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c|Patua+One|Source+Serif+Pro" rel="stylesheet">
    @yield('head')
  </head>
  <body>
    <header>
      @include('navbar')
    </header>

@yield('content')
    <script src="{{ mix('js/app.js') }}" defer></script>
  </body>
</html>
@yield('footer')
