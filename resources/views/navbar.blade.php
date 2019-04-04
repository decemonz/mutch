<nav id="navbar">
  <div class="c-navbar">
    <div class="c-navbar__title">
    <a href="/"><h1>Match</h1></a>
    </div>
   <div class="c-navbar__menu">



     @if(Auth::check())

         <div class="c-navbar__item">
         <a href="#" id="logout"><span class="my-navbar-item">{{Auth::user()->name}}さん</span></a>
         </div>

         <div class="c-navbar__item">
         <a href="#" id="logout">ログアウト</a>
         </div>

         <form class="" id="logout-form" action="{{ route('logout')}}" method="post" style="display:none;">
           @csrf
         </form>


         <div class="c-navbar__item">
           <h2>案件一覧</h2>
         </div>
         <div class="c-navbar__item">
          <a href="/article_register">案件登録</a>
         </div>

         @else


         <div class="c-navbar__item">
          <a href="/login">ログイン</a>
         </div>
         <div class="c-navbar__item">
          <a href="/register">ユーザー登録</a>
         </div>
         @endif







   </div>


  </div>

</nav>
