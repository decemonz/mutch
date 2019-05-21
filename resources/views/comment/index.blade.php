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


    @endforeach

    {{ $articles->links()}}

 </div>
 <div class="back__btn">
     <a class="pagi__button" href="{{ route('user.show')}}"> &laquo; Back</a>
 </div>


</div>


@endsection
@section('footer')
@endsection
