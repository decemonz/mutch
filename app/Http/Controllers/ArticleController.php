<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use App\Article;
use App\User;
use App\Board;
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

    public function edit($id){
      $article = Article::findOrFail($id);
    return  view('article.edit',compact('article'));
    }

    public function update(ArticleRequest $request ,$id){
      $article = Auth::user()->articles()->update($request->validated());
      return redirect()->route('article.show',['id' => $id]);

    }

    public function show($id){
      $article = Article::find($id);
      $user = User::find($article->user_id);
      $comments = $article->comments;

      // 記事に紐づくボードを取得
      $boards = Board::where('article_id',$id)->get();

      return view('article.show',compact('article','user','comments','boards'));
    }
}
