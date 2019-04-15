@extends('layout')

@section('content')
<div id="form">
  <div class="c-form">
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
          <form class="" action="{{ route('password.email')}}" method="post">
            @csrf
            <div class="c-form__group">
              <label for="email">メールアドレス</label>
              <input type="text" class="c-form__control" id="email" name="email" value="{{ old('email')}}" />
            </div>



            <div class="text-right">
              <button type="submit" name="button" class="c-btn btn-primary">再発行リンクを送る</button>
            </div>
          </form>
        </div>
  </div>
</div>
@endsection
