@extends('layout')

@section('content')
<div id="form">
  <div class="c-panel__container">
        <div class="c-form__head">
          パスワード再発行
        </div>
        <div class="panel-body">
          @if($errors->any())
          <div class="alert alert-danger">
            @foreach($errors->all() as $message)
            <p>{{ $message }}</p>
            @endforeach
          </div>
          @endif
          <form class="" action="{{ route('password.update')}}" method="post">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}" />
            <div class="c-form__group">
              <label for="email">メールアドレス</label>
              <input type="text" class="c-form__control" id="email" name="email" value="{{ old('email')}}" />
            </div>

            <div class="c-form__group">
              <label for="password">新しいパスワード</label>
              <input type="password" class="c-form__control" id="password" name="password" >
            </div>
            <div class="c-form__group">
              <label for="password-confirm">新しいパスワード(確認)</label>
              <input type="password" class="c-form__control" id="password-confirm" name="password_confirmation" >
            </div>

            <div class="text-right">
              <button type="submit" name="button" class="c-btn btn-primary">送信</button>
            </div>
          </form>
        </div>
  </div>
</div>
@endsection
