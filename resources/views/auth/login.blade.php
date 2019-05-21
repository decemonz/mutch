@extends('layout')

@section('content')
<div id="form">
  <div class="c-panel__container">

        <div class="c-form__head">
          ログイン
        </div>

        <div class="panel-body">

          @if($errors->any())
          <div class="alert alert-danger">
            @foreach($errors->all() as $message)
            <p>{{ $message }}</p>
            @endforeach
          </div>
          @endif
          
          <form class="" action="{{ route('login')}}" method="post">
            @csrf
            <div class="c-form__group">
              <label for="email">メールアドレス</label>
              <input type="text" class="c-form__control" id="email" name="email" value="{{ old('email')}}" />
            </div>

            <div class="c-form__group">
              <label for="password">パスワード</label>
              <input type="password" class="c-form__control" id="password" name="password" >
            </div>

            <div class="text-right">
              <button type="submit" name="button" class="c-btn btn-primary">送信</button>
            </div>
          </form>

          <div class="">

            <a href="{{ url('/email')}}">  <p>パスワードを忘れた場合</p></a>
          </div>
        </div>
  </div>
</div>
@endsection
