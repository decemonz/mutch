<nav class="navbar" id="js-logout">

  <div class="c-navbar">

    <div class="c-navbar__title">
      <a href="/"><h1>Match</h1></a>
    </div>

   <div class="c-navbar__menu">
     @if(Auth::check())

         <div class="c-navbar__item">
         <a href="{{ route('user.show')}}" ><span class="my-navbar-item">マイページ</span></a>
         </div>

          <div class="c-navbar__item">
            <a href="#"  @click="logout">ログアウト</a>
          </div>

          <form class="" id="logout-form" action="{{ route('logout')}}" method="post" style="display:none;">
            @csrf
          </form>

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




       <div class="c-navbar__span"  @click="isActive=!isActive" >
         <span class="c-navbar__span-1"></span>
         <span class="c-navbar__span-2"></span>
         <span class="c-navbar__span-3"></span>
       </div>


 </div>

      <div  class="c-navbar__menu-hide" v-bind:class="{ 'active':isActive }">

       <div class="c-navbar__close"　@click="isActive=!isActive">
         ✖️
       </div>

        @if(Auth::check())

            <div class="c-navbar__item-hide">
            <a href="{{ route('user.show')}}" ><span class="my-navbar-item">マイページ</span></a>
            </div>


             <div class="c-navbar__item-hide">
               <a href="#"  @click="logout">ログアウト</a>
             </div>

             <form class=""  action="{{ route('logout')}}" method="post" style="display:none;">
               @csrf
             </form>


            <div class="c-navbar__item-hide">
              <a href="{{ route('article.index')}}">案件一覧</a>
            </div>

            <div class="c-navbar__item-hide">
             <a href="{{ route('article.create')}}">案件登録</a>
            </div>

            @else

            <div class="c-navbar__item-hide">
             <a href="/login">ログイン</a>
            </div>
            <div class="c-navbar__item-hide">
             <a href="/register">ユーザー登録</a>
            </div>
            @endif

       </div>
</nav>
