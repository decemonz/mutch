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

            <div>

            <div class="c-form__group">

              <label for="name">案件種別</label>
         <p v-if="hi_price < low_price" class="alert">下限が上限を超えています。</p>
              <select class="c-form__control" name="kind" value="{{ $article->kind}}" v-model="kind">
                <option value="single">単発</option>
                <option value="revenue">レベニューシェア</option>
              </select>

            </div>

            <div class="c-form__group"  v-if="kind === 'single'" >
              <label for="price">金額</label><br>
              下限:
              <input type="number" class="c-form__control-price" placeholder="1000円~" v-model="low_price" name="low_price">  (円)　　<br>
              <input id="low" style="display:none;" value="{{ $article->low_price}}"> </input>
              上限:
              <input type="number" class="c-form__control-price" v-model="hi_price" name="hi_price" > (円)
              <input id="hi" style="display:none;"  value="{{ $article->hi_price}}"> </input>
            </div>

          </div>
            <div class="c-form__group">
              <label for="body">内容</label>
              <textarea name="body" rows="8" cols="80" class="c-form__area" >{{ $article->body}}</textarea>
            </div>
            <div class="text-right">
              <button v-if="low_price <= hi_price" type="submit" name="button" class="c-btn btn-primary">更新</button>
              <button v-if="low_price > hi_price"　type="" class="c-btn btn-primary"　disabled>エラーがあります</button>
            </div>
          </form>

          <div class="text-right" id="js-confirm">

            <form class="" action="{{ url('article_delete',$article->id)}}" method="post" onSubmit="return confirm('記事を削除してよろしいですか？')">
              @csrf
                <button type="submit" name="button" class="c-btn">記事削除</button>
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
