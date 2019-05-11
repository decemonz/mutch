@extends('layout')

@section('head')

@endsection

@section('content')

@if($boards)

<div class="p-top__panel">

    ユーザーより最新応募があります

  @foreach($boards as $board)

  <div class="">

    <a class="" href="{{ url('show_board',$board->id)}}">
      {{date('Y/m/d',strtotime($board->created_at))}}
      {{ $board->id }}
      {{ $board->article->title }}
    </a>

  </div>
  @endforeach
  <!-- @foreach($articles as $article)

  <div class="">
    {{date('Y/m/d',strtotime($article->created_at))}}
    {{ $article->id }}
    {{ $article->title}}
  </div>

  @endforeach -->

</div>

@endif


<div class="c-image__container">



<img src="top.jpg" alt="" class="c-image__top">


<div class="p-top__container">
  <h1 class="p-top__title">Match</h1>
  <p class="p-top__para">簡単に案件投稿、応募を可能にし、手軽さを追求したマッチングサービスです。</p>
</div>


</div>


@endsection

@section('footer')
@endsection
