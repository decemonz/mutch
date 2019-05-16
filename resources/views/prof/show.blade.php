@extends('layout')

@section('head')

@endsection

@section('content')

<div class="show">

  <div class="c-panel__container">

      <p class="p-show__contents">No.{{ $user->id }}</p>

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

<!-- @if( $user->id === Auth::user()->id)

  <div class="p-show__contents">

   <p class="p-show__label">取引中案件一覧</p>


   @if($client_boards)

    @foreach($client_boards as $client_board)

   <div class="p-show__contents">

    No.{{ $client_board->id}}

     <a href="{{ url('show_board',$client_board->id)}}">
       {{ $client_board->article_title}}
     </a>
     </br>

   </div>

    @endforeach

  @endif

  </div>

   <div class="p-show__contents">
    <p class="p-show__label">応募中案件一覧</p>

      @if($apply_boards)

      @foreach($apply_boards as $apply_board)

      <div class="p-show__contents">
      No.{{ $apply_board->id}}   <a href="{{ url('show_board',$apply_board->id)}}">

    　　　{{ $apply_board->article_title }}
        </a>
      </div>

      @endforeach

      @endif

   </div>

@endif -->


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
