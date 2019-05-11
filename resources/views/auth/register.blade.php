@extends('layout')

@section('content')
<div class="show">
  <div class="c-panel__container">
        <div class="c-form__head">
          会員登録
        </div>
        <div class="panel-body">
          @if($errors->any())
          <div class="alert alert-danger">
            @foreach($errors->all() as $message)
            <p>{{ $message }}</p>
            @endforeach
          </div>
          @endif
          <form class="" action="{{ route('register')}}" method="post">
            @csrf
            <div class="c-form__group">
              <label for="email">メールアドレス</label>
              <input type="text" class="c-form__control" id="email" name="email" value="{{ old('email')}}" />
            </div>
            <div class="c-form__group">
              <label for="name">ユーザー名</label>
              <input type="text" class="c-form__control" id="name" name="name" value="{{ old('name')}}" />
            </div>
            <div class="c-form__group">
              <label for="password">パスワード</label>
              <input type="password" class="c-form__control" id="password" name="password" >
            </div>
            <div class="c-form__group">
              <label for="password-confirm">パスワード（確認）</label>
              <input type="password" class="c-form__control" id="password-confirm" name="password_confirmation"  >
            </div>
            <div class="text-right">
              <button type="submit" name="button" class="c-btn btn-primary">送信</button>
            </div>
          </form>
        </div>
  </div>
</div>
@endsection
@section('footer')
@endsection
