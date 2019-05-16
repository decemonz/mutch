<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\User;
use App\Board;
use Illuminate\Support\Facades\Auth;

// jsonをvueに送るためのコントローラー

class ArticlesController extends Controller
{
  public function index(){
    $articles = Article::paginate(3);
    return $articles;

  }

  public function show($id){
    $article = Article::find($id);
    return $article;
  }

  public function user($id){
    $article = Article::find($id);
    $user = User::find($article->user_id);

    return $user;
  }

  public function comments($id){
    $article = Article::find($id);
    $comments = $article->comments;

    return $comments;
  }

  public function boards($id){

    // 記事に紐づくボードを取得
    $boards = Board::where('article_id',$id)->get();

    return $boards;
  }

  public function currentUser($id){
    $currentUser = Auth::user();
    return $currentUser;
  }

}
