<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;
use App\Comment;
use App\Article;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function __construct()
      {
          $this->middleware('comment')
              ->except(['store', 'index']);
      }

    public function store(CommentRequest $request, $id){

      $comments = Comment::create($request->validated());
      $comments->save();
      // return view('article.show',['id'=>$id]);
      return redirect()->route('article.show',$id);
    }
// コメント削除
    public function destroy($id){
      $comment = Comment::findOrFail($id);
      $comment->delete();
      $article = $comment->article;
      return redirect()->route('article.show',$article->id);
    }

    public function index(){
      $articles = Article::all();
      $comments = Auth::user()->comment;


      return view('comment.index',compact('articles'));

    }
}
