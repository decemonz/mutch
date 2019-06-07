@extends('layout')

@section('head')

@endsection

@section('content')

<div class="show">


  <div class="c-panel__container">

      <p class="p-show__number">No.{{ $article->id}}</p>

        <a id="tweet" class="tweet__btn" style="color:white;cursor:pointer;" onclick="window.open('https://twitter.com/intent/tweet?url=https://stark-headland-31167.herokuapp.com/articles/{{$article->id}}&text={{$article->title}}','newwindow','width=500,height=400');"><i class="fab fa-twitter"></i>tweet</a>

  @if($article->user_id === Auth::user()->id)

      <a href="{{ url('articleEdit',$article->id)}}">
        <button class="p-small__btn p-show__edit">編集</button>
      </a>

  @endif
　
      <p class="p-show__title">{{ $article->title}}</p>

      <h1 class="p-show__label">投稿者</h1>
      　 <p class="p-show__contents">{{ $user->name }}</p>

      <h1 class="p-show__label">案件種別</h1>

    　<p class="p-show__contents">

        @if ($article->kind === 'single' )
          単発
        @else
          レベニューシェア
        @endif

  　　 </p>

      @if($article->kind === 'single')

      <h1 class="p-show__label">金額</h1>
      　 <p class="p-show__contents">{{ $article->low_price }}円　〜　{{ $article->hi_price }}円</h1>

      @endif

    　<h1 class="p-show__label pb-3">内容</h1>

        <p class="p-show__contents">

          {{ $article->body}}

        </p>

      <!-- 応募済みかどうかを判別するための変数を定義  -->
      <?php $applyed = false ?>

<!-- ログインユーザーが投稿した記事の場合は応募ボタンを非表示 -->
@if($article->user_id !== Auth::user()->id)

　@foreach($boards as $board)

    <!-- ボードidに現在のログインユーザーidが存在する場合はすでに応募済みのため取引メッセージへのリンクを表示 -->
    @if($board->user_id === Auth::user()->id )
      <a href="{{ url('show_board',$board->id)}}">
          <button name="button" class="c-btn">取引メッセージへ
          </button>
      </a>
      <!-- 応募済みのため変数をtrueにする -->
      <?php $applyed = true ?>

    @endif

　@endforeach

  <!-- 変数applyがfalseの場合まだ応募していない為応募ボタンを表示 -->
  @if($applyed === false)

  <!-- 応募ボタンを押すとフォームが送信されダイレクトメッセージボードを作成 -->
    <form class="" action="{{ url('/board')}}" method="post">
      @csrf
      <input type="text" name="article_id" value="{{ $article->id}}" style="display:none;">
      <input type="text" name="client_id" value="{{ $article->user_id}}" style="display:none;">
      <input type="text" name="user_id" value="{{ Auth::user()->id}}" style="display:none;">
      <input type="text" name="article_title" value="{{ $article->title}}" style="display:none;">
      <button type="submit" name="button" class="c-btn">応募する</button>
    </form>

   @endif

@endif





    <section id="comment">

          <div class="panel-body">

            @if($errors->any())
            <div class="alert alert-danger">

              @foreach($errors->all() as $message)
               <p　class="error">{{ $message }}</p>
              @endforeach

            </div>
            @endif
            <!-- コメント作成フォーム -->
            <form class="" action="{{ url('comment',$article->id)}}" method="post">
              @csrf

              <div class="c-form__group">
                <label for="body">コメント</label>
                <textarea name="body" rows="8" cols="65" class="c-form__area"></textarea>
              </div>

             <input type="text" name="user_name" value="{{Auth::user()->name}}" style="display:none;">

                <input type="text" name="article_id" value="{{$article->id}}" style="display:none;">

              <div class="text-right">
                <button type="submit" name="button" class="p-small__btn btn-primary">投稿</button>
              </div>

            </form>
          </div>

      @if(count($comments) > 0)

      <div class="p-comment__label">コメント一覧</div>
      <div class="p-comment__container">

          @foreach($comments as $comment)

            <div class="p-comment__items">
              <p class="p-comment__name">name:{{ $comment->user_name}}</p>
              <p class="p-comment__text">{{ $comment->body }}</p>
              <p class="p-comment__date">{{ date('Y/m/d , H:i',strtotime($comment->created_at))}}</p>

              @if($comment->user_name === Auth::user()->name)
              <!-- コメント削除フォーム -->
              <form class="" action="{{url('comment_delete',$comment->id)}}" method="post">
                @csrf
                <button type="submit" class="p-comment__delete btn-primary">削除</button>
              </form>

              @endif

            </div>

          @endforeach

      </div>
    @endif

    </section>

  </div>

  <div class="back__btn">
      <a class="pagi__button" href="{{ route('article.index')}}"> &laquo; Back</a>
  </div>



</div>

@endsection

@section('footer')
@endsection
