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
    $articles = Article::orderBy('created_at','DESC')->paginate(3);
    return $articles;

  }
// 記事詳細のvueにデータをjsonで送る
  public function show($id){
    // 配列dataを定義
    $data = [];
    $article = Article::find($id);
    $user = User::find($article->user_id);
    $comments = $article->comments;
    $boards = Board::where('article_id',$id)->get();
    $currentUser = Auth::user();

    // 変数dataに詰めて行く
    array_push($data,$article);
    array_push($data,$user);
    array_push($data,$comments);
    array_push($data,$boards);
    array_push($data,$currentUser);

    return $data;
  }

}
