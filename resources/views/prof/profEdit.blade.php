@extends('layout')

@section('content')
<div id="form">
  <div class="c-panel__container">
        <div class="c-form__title">
          プロフィール登録
        </div>
        <div class="panel-body">
          @if($errors->any())
          <div class="alert alert-danger">
            @foreach($errors->all() as $message)
            <p>{{ $message }}</p>
            @endforeach
          </div>
          @endif
          <form class="" action="{{ url('profEdit','update')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="c-form__group">
              <label for="email">メールアドレス</label>
              <input type="text" class="c-form__control" name="email" value="{{ $user->email}}" />
            </div>
            <div class="c-form__group">
              <label for="image">プロフィール画像</label>
              <input type="file" class="c-form__control" name="image" value="{{ $user->image}}" />
            </div>
            <div class="c-form__group">
              <label for="body">自己紹介</label>
              <textarea name="body" rows="8" cols="80" class="c-form__area">{{ $user->body}}</textarea>
            </div>
            <div class="text-right">
              <button type="submit" name="button" class="c-btn btn-primary">送信</button>
            </div>
          </form>
        </div>
  </div>

  <div class="back__btn">
      <a class="pagi__button" href="{{route('user.show')}}"> &laquo; Back</a>
  </div>

</div>
@endsection
