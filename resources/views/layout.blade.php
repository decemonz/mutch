<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c|Patua+One|Source+Serif+Pro" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Sawarabi+Gothic" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
<script src="https://js.pusher.com/4.3/pusher.min.js"></script>
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
