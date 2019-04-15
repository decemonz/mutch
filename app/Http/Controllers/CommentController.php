<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function store(CommentRequest $request, $id){
      $comments = Comment::create($request->validated());
      $comments->save();
      // return view('article.show',['id'=>$id]);
      return redirect()->route('article.show',$id);
    }

    public function destory($id){
      $comment = Comment::findOrFail($id);
      $comment->delete();
      return redirect()->route('top');
    }
}
