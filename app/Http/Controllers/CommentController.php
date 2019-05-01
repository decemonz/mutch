<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function store(CommentRequest $request, $id){

      $message = [ 'コメント送信されました'  ];
      event(new \App\Events\ApplyPusher($message));

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
}
