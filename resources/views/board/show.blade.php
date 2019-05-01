@extends('layout')

@section('head')

@endsection

@section('content')



    <section class="show">




<div class="p-message">

  <div class="p-show__contents">
      {{ $article->title}}
  </div>

      @foreach($messages as $message)

      @if($message->user->name == Auth::user()->name)

      <div class="p-message__left">
        <p class="p-message__left-date">{{ date('Y/m/d',strtotime($message->created_at))}}</p>
        <p class="p-message__left-name">{{ $message->user->name }}</p>
        <img src="/images/{{ $message->user->image }}" alt="" class="p-message__left-image">
        <p>{{ $message->body }}</p>
      </div>


      @else

      <div class="p-message__right">
        <p class="p-message__right-date">{{ date('Y/m/d',strtotime($message->created_at)) }}</p>
        <p class="p-message__right-name">{{ $message->user->name }}</p>
        <img src="/images/{{ $message->user->image }}" alt="" class="p-message__right-image">
        <p>{{ $message->body }}</p>
      </div>


      @endif

      @endforeach

  </div>

              <div class="panel-body">
                @if($errors->any())
                <div class="alert alert-danger">
                  @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                  @endforeach
                </div>
                @endif
                <form class="" action="{{ url('message',$board->id)}}" method="post">
                  @csrf

                  <div class="c-form__group">
                    <label for="body">メッセージ</label>
                    <textarea name="body" rows="8" cols="65" class="c-form__area"></textarea>
                  </div>
                 <input type="text" name="user_id" value="{{Auth::user()->id}}" style="display:none;">
                 <input type="text" name="board_id" value="{{$board->id}}" style="display:none;">

                  <div class="text-right">
                    <button type="submit" name="button" class="p-comment__btn btn-primary">投稿</button>
                  </div>
                </form>
              </div>



    </section>



@endsection

@section('footer')
@endsection
