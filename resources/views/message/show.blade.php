@extends('layout')

@section('head')

@endsection

@section('content')



    <section id="form">



              <div class="panel-body">
                @if($errors->any())
                <div class="alert alert-danger">
                  @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                  @endforeach
                </div>
                @endif
                <form class="" action="" method="post">
                  @csrf

                  <div class="c-form__group">
                    <label for="body">メッセージ</label>
                    <textarea name="body" rows="8" cols="65" class="c-form__area"></textarea>
                  </div>
                 <input type="text" name="user_name" value="{{Auth::user()->name}}" style="display:none;">

                  <div class="text-right">
                    <button type="submit" name="button" class="p-comment__btn btn-primary">投稿</button>
                  </div>
                </form>
              </div>



    </section>



@endsection

@section('footer')
@endsection
