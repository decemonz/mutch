<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use App\Article;
use App\User;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    //

    public function index(){
      $articles = Article::all();
      return view('article.index',compact('articles'));

    }

    public function create(){
      return view('article.create');
    }

    public function store(ArticleRequest $request){
      $article = Auth::user()->articles()->create($request->validated());
      $article->save();
      return redirect()->route('article.index',['id' => $article->id]);
    }

    public function show($id){
      $article = Article::find($id);
      $user = User::find($article->user_id);
      $comments = $article->comments();
      return view('article.show',compact('article','user','comments'));
    }
}
