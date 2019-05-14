@extends('layout')

@section('head')

@endsection

@section('content')

<div class="show">

  <div class="c-panel__container">


      <h1 class="p-show__label pb-3">ダイレクトメッセージ一覧</h1>



@if( $user->id === Auth::user()->id)

  <div class="p-show__contents">

   <p class="p-show__label">取引中案件</p>


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
     <br>

   </div>

    @endforeach

  @endif

  </div>

   <div class="p-show__contents">
    <p class="p-show__label mt-3">応募中案件</p>

      @if($apply_boards)

      @foreach($apply_boards as $apply_board)

      <div class="p-show__contents">


        <a href="{{ url('show_board',$apply_board->id)}}">

          <div class="p-show__newlabel">
            {{ $apply_board->article_title}}
          </div>

          投稿者 :<p style="display:none;">{{$id = $apply_board->client_id}}</p>
          {{ App\User::find($id)->name}}様

        </a>
        <br>

      </div>

      @endforeach

      @endif

   </div>

@endif


  </div>
  <div class="back__btn">
      <a class="pagi__button" href="{{ route('user.show')}}"> &laquo; Back</a>
  </div>


</div>


@endsection

@section('footer')
@endsection
