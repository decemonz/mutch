@extends('layout')

@section('head')

@endsection

@section('content')


<div id="articles">
  
  <div class="c-article__title">
    案件一覧
  </div>

@foreach($articles as $article)
<div class="c-panel__container">
  <p class="c-article__id">No. {{ $article->id}}</p>
  <a href="{{ url('articles',$article->id)}}">
    <div class="c-article__title">
      {{ $article->title}}
    </div>
    <p class="c-article__price">
      金額　:　{{ $article->low_price}}円　~　{{ $article->hi_price}}円
    </p>
    <p class="c-article__kind">
    @if ( $article->kind  === 'single' )
     単発
    @else
     レベニューシェア
    @endif
    </p>
    <div class="c-article__body">
        {{ $article->body}}
    </div>

  </a>
</div>


@endforeach

</div>

@endsection

@section('footer')
@endsection
