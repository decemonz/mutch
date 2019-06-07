<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf8_general_ci">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title></title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c|Patua+One|Source+Serif+Pro" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Sawarabi+Gothic" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
<script src="https://js.pusher.com/4.3/pusher.min.js"></script>
<script src="/js/app.js"></script>

    @yield('head')
  </head>
  <body>
    <header>
      @include('navbar')
    </header>

@yield('content')
    <script src="{{ mix('js/app.js') }}" defer></script>

    <footer class="p-footer" >


        <ul class="p-footer__list" id="js-logout-footer">
          @if(Auth::check())
          <li class="p-footer__item"> <a href="{{ route('article.index')}}">| 案件一覧 </a> </li>
          <li class="p-footer__item" > <a href="" @click="logout">| ログアウト</a> </li>
          <form class="" id="logout-form-footer" action="{{ route('logout')}}" method="post" style="display:none;">
            @csrf
          </form>
          <li class="p-footer__item"> <a href="{{ route('article.create')}}">| 案件登録</a> </li>
          <li class="p-footer__item"> <a href="{{ route('user.show')}}">|マイページ</a> </li>


          @else
                    <li class="p-footer__item-guest"> <a href="/register">|ユーザー登録</a> </li>
          <li class="p-footer__item-guest"> <a href="/login">| ログイン</a> </li>
          @endif

        </ul>
   <p class="p-footer__copyright"> Copyright ©2019 LLC. All Rights Reserved.</p>




    </footer>
  </body>
</html>
@yield('footer')
