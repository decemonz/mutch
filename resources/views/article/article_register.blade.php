@extends('layout')

@section('content')
<div id="login">
  <div class="c-form">
        <div class="c-form__head">
          案件登録
        </div>
        <div class="panel-body">
          @if($errors->any())
          <div class="alert alert-danger">
            @foreach($errors->all() as $message)
            <p>{{ $message }}</p>
            @endforeach
          </div>
          @endif
          <form class="" action="{{ route('article.create')}}" method="post">
            @csrf
            <div class="c-form__group">
              <label for="title">タイトル</label>
              <input type="text" class="c-form__control" id="title" name="titile" value="{{ old('title')}}" />
            </div>
            <div class="c-form__group">
              <label for="name">案件種別</label>
              <select class="c-form__control" name="kind">
                <option value="single">単発</option>
                <option value="revenue">レベニューシェア</option>
              </select>
            </div>
            <div class="c-form__group">
              <label for="price">金額</label><br>
              下限:
              <input type="number" class="c-form__control-price" id="hi-price" name="hi-price" > (千円)　　<br>
              上限:
              <input type="number" class="c-form__control-price" id="low-price" name="low-price" > (千円)
            </div>
            <div class="c-form__group">
              <label for="content">内容</label>
              <textarea name="content" rows="8" cols="80" class="c-form__area"></textarea>
            </div>
            <div class="text-right">
              <button type="submit" name="button" class="c-btn btn-primary">送信</button>
            </div>
          </form>
        </div>
  </div>
</div>
@endsection
