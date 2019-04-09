<nav id="navbar">
  <div class="c-navbar">
    <div class="c-navbar__title">
    <a href="/"><h1>Match</h1></a>
    </div>
   <div class="c-navbar__menu">



     @if(Auth::check())

         <div class="c-navbar__item">
         <a href="{{ route('user.edit')}}" ><span class="my-navbar-item">{{Auth::user()->name}}さん</span></a>
         </div>

        <div id="logout">
          <div class="c-navbar__item">
          <a href="#"  @click="logout">ログアウト</a>
          </div>

          <form class="" id="logout-form" action="{{ route('logout')}}" method="post" style="display:none;">
            @csrf
          </form>
        </div>



         <div class="c-navbar__item">
           <a href="{{ route('article.index')}}">案件一覧</a>

         </div>
         <div class="c-navbar__item">
          <a href="{{ route('article.create')}}">案件登録</a>
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
