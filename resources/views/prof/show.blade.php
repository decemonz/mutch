@extends('layout')

@section('head')

@endsection

@section('content')

<div class="show">

  <div class="c-panel__container">

      <p class="p-show__label">No.{{ $user->id }}</p>

      <h1 class="p-show__label">ユーザー名</h1>
    　 <p class="p-show__contents">{{ $user->name }}</p>

      <div class="p-show__image">
        <img class="prof__image" src="https://s3-ap-northeast-1.amazonaws.com/match-test01/{{ $user->image }}" alt="">
      </div>

    　<h1 class="p-show__label pb-3">自己紹介</h1>

        <p class="p-show__contents pb-3">
          {{ $user->body}}
        </p>

  @if( $user->id === Auth::user()->id)
    <div class="p-show__contents pb-3">
      <a href="{{ route('user.edit')}}" >
          <button class="c-btn">プロフィールを編集する</button>
      </a>
    </div>
  @endif


  <div class="p-show__contents">

   <p class="p-show__label">最新投稿案件一覧</p>

    @foreach($articles as $article)

      <a class="p-show__container" href="{{ url('articles',$article->id)}}">

        <p class="p-show__newlabel"> ○ {{$article->title}} </p>
        <p>{{ date('Y/m/d',strtotime($article->created_at))}}</p>
        <p class="p-show__contents">{{ str_limit($article->body,$limit = 100, $end = '...')}}</p>

      </a>

    @endforeach

    {{ $articles->links()}}

  </div>

 @if( $user->id === Auth::user()->id)

  <div class="p-show__contents">

   <p class="p-show__label">最新取引中案件一覧</p>


   @if($client_boards)

    @foreach($client_boards as $client_board)

   <div class="p-show__contents">

    <a href="{{ url('show_board',$client_board->id)}}">

      <p class="p-show__newlabel">
        {{ $client_board->article_title}}
      </p>
      <span class="p-show__contents">応募者 :<p style="display:none;">{{$id = $client_board->user_id}}</p>
      {{ App\User::find($id)->name}}様</span>

    </a>
     </br>

   </div>

    @endforeach


  @else
  <p class="p-show__newlabel">
 取引中案件はまだありません。
  </p>

  @endif

  </div>

   <div class="p-show__contents">
    <p class="p-show__label">最新応募中案件一覧</p>

      @if($apply_boards)

      @foreach($apply_boards as $apply_board)

      <div class="p-show__contents">
    <a href="{{ url('show_board',$apply_board->id)}}">

          <div class="p-show__newlabel">
            {{ $apply_board->article_title}}
          </div>

         <span class="p-show__contents">  投稿者 :<p style="display:none;">{{$id = $apply_board->client_id}}</p>
          {{ App\User::find($id)->name}}様</span>

        </a>
      </div>

      @endforeach

      @endif

   </div>

@endif

<div class="p-show__contents">

<p class="p-show__label">最新コメント一覧</p>

  @foreach($comment_articles as $comment_article)

  <div class="" style="display:none;">
    <!-- 案件記事に紐付いたコメント取得 -->
    {{ $article_comments = $comment_article->comments }}
  </div>


  <div class="p-show__contents">

      <a href="{{ url('articles',$comment_article->id)}}" class="p-show__contents">

      <div class="p-show__newlabel">
            {{ $comment_article->title }}
      </div>

      @foreach($article_comments as $article_comment)

      <!-- 自分の投稿したコメントかどうかを判定 -->
        @if($article_comment->user_name === Auth::user()->name)

      <div  class="p-comment__items-index">

        <p class="p-comment__name">name:{{ $article_comment->user_name}}</p>
        <p class="p-comment__text">{{ $article_comment->body }}</p>
        <p class="p-comment__date">{{ date('Y/m/d , H:i',strtotime($article_comment->created_at))}}</p>

      </div>

      <!-- コメント最新一件取得のため一件表示後break -->
          @break

        @endif

      @endforeach

      </a>

  </div>


  @endforeach

</div>



<a class="p-show__label" href="{{ route('comment.index')}}"> コメント一覧</a>
<a class="p-show__label" href="{{ route('board.index')}}"> ダイレクトメッセージ一覧</a>


  </div>

  <div class="back__btn">
      <a class="pagi__button" href="{{route('top')}}"> &laquo; Back</a>
  </div>


</div>




@endsection

@section('footer')
@endsection
