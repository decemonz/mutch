@extends('layout')

@section('content')
<div id="form">
  <div class="c-panel__container">
        <div class="c-form__title">
          案件編集
        </div>
        <div class="panel-body">
          @if($errors->any())
          <div class="alert alert-danger">
            @foreach($errors->all() as $message)
            <p>{{ $message }}</p>
            @endforeach
          </div>
          @endif
          <form class="" action="{{ url('articleUpdate',$article->id)}}" method="post">
            @csrf
            <div class="c-form__group">
              <label for="title">タイトル</label>
              <input type="text" class="c-form__control" name="title" value="{{ $article->title}}" />
            </div>

            <div id="js-kind">

            <div class="c-form__group">

              <label for="name">案件種別</label>

              <select class="c-form__control" name="kind" value="{{ $article->kind}}" v-model="kind">
                <option value="single">単発</option>
                <option value="revenue">レベニューシェア</option>
              </select>

            </div>

            <div class="c-form__group"  v-if="kind === 'single'" >
              <label for="price">金額</label><br>
              下限:
              <input type="number" class="c-form__control-price" placeholder="1000円~" id="low_price" name="low_price" value="{{ $article->low_price}}"> (円)　　<br>
              上限:
              <input type="number" class="c-form__control-price" id="hi_price" name="hi_price" value="{{ $article->hi_price}}"> (円)
            </div>

          </div>
            <div class="c-form__group">
              <label for="body">内容</label>
              <textarea name="body" rows="8" cols="80" class="c-form__area" >{{ $article->body}}</textarea>
            </div>
            <div class="text-right">
              <button type="submit" name="button" class="c-btn btn-primary">更新</button>
            </div>
          </form>

          <div class="text-right" id="js-confirm">

            <form class="" action="{{ url('article_delete',$article->id)}}" method="post" onSubmit="return confirm('記事を削除してよろしいですか？')">
              @csrf
                <button type="submit" name="button" class="c-btn"　>記事削除</button>
            </form>

          </div>
        </div>
  </div>

  <div class="back__btn">

    <a class="pagi__button" href="{{route('article.show',$article->id)}}"> &laquo; Back</a>

  </div>

</div>
@endsection

@section('footer')
@endsection
