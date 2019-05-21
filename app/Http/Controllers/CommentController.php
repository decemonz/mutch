<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;
use App\Comment;
use App\Article;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

  // ログインユーザー以外がアクセスできないよう制御
    public function __construct()
      {
          $this->middleware('comment')
              ->except(['store', 'index']);
      }

// コメント作成
    public function store(CommentRequest $request, $id){

      $comments = Comment::create($request->validated());
      $comments->save();
      return redirect()->route('article.show',$id);
    }

// コメント削除
    public function destroy($id){
      $comment = Comment::findOrFail($id);
      $comment->delete();
      $article = $comment->article;
      return redirect()->route('article.show',$article->id);
    }

// コメント一覧
    public function index(){
      // ログインユーザーがコメントしている案件記事を取得
      $articles = Article::whereHas('comments',function($q){
        $q->where('user_name','=',Auth::user()->name);
      })->paginate(3);
      return view('comment.index',compact('articles'));

    }
}
