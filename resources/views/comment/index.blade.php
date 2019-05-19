@extends('layout')

@section('head')

@endsection


@section('content')
<div class="show">

  <div class="c-panel__container">


  <p class="p-show__label pb-3">最新コメント一覧</p>

    @foreach($articles as $article)

    <div class="" style="display:none;">
<!-- 案件記事に紐付いたコメント取得 -->
      {{ $comments = $article->comments }}
    </div>

    <!-- 変数$hideを定義 -->
  <?php $hide = 'true'; ?>

      @foreach($comments as $comment)
        @if($comment->user_name === Auth::user()->name)
        <!-- 記事のコメントに自分の投稿が含まれる場合変数にtrueを代入する -->
          <?php $hide =  'false'; ?>
          @break
        @endif
      @endforeach

<!-- 上記処理で変数にtrueが入っている場合のみ記事を表示する -->
@if($hide === 'false')

    <div class="p-show__contents">

        <a href="{{ url('articles',$article->id)}}" class="p-show__contents">

        <div class="p-show__newlabel">
              {{ $article->title }}
        </div>

        @foreach($comments as $comment)

        <!-- 自分の投稿したコメントかどうかを判定 -->
          @if($comment->user_name === Auth::user()->name)

        <div  class="p-comment__items-index">

          <p class="p-comment__name">name:{{ $comment->user_name}}</p>
          <p class="p-comment__text">{{ $comment->body }}</p>
          <p class="p-comment__date">{{ date('Y/m/d , H:i',strtotime($comment->created_at))}}</p>

        </div>

    <!-- コメント最新一件取得のため一件表示後break -->
            @break

          @endif

        @endforeach

        </a>

    </div>

    @endif

    @endforeach

<div class="c-pagination">

</div>

 </div>
 <div class="back__btn">
     <a class="pagi__button" href="{{ route('user.show')}}"> &laquo; Back</a>
 </div>


</div>


@endsection
@section('footer')
@endsection
