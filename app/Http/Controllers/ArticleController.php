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
    //ログインユーザー以外がアクセスできないよう制限
    public function __construct(){
      $this->middleware('article')->except(['top','index','create','store','show']);
    }

    // トップ画面
    public function top(){
      $user = Auth::user();
      $user_id = $user->id;
      $articles = $user->articles;
      $boards = Board::where('client_id',$user_id)->orderBy('created_at','DESC')->paginate(5);
      return view('pages.top',compact('articles','user','boards'));
    }

// 記事一覧を表示（中身はvueで表示させるためviewを返すのみ）
    public function index(){
      return view('article.index');
    }

// 案件記事登録画面
    public function create(){
      return view('article.create');
    }

// 案件登録
    public function store(ArticleRequest $request){
      // ログインユーザーと紐づけて作成
      $article = Auth::user()->articles()->create($request->validated());
      $article->save();
      return redirect()->route('article.index',['id' => $article->id]);
    }

// 案件記事編集
    public function edit($id){
      $article = Article::findOrFail($id);
    return  view('article.edit',compact('article'));
    }

// 案件記事更新
    public function update(ArticleRequest $request ,$id){
      $article = Auth::user()->articles()->update($request->validated());
      return redirect()->route('article.show',['id' => $id]);
    }

// 案件記事詳細
    public function show($id){
      $article = Article::find($id);
      $user = User::find($article->user_id);
      $comments = $article->comments;

      // 記事に紐づくボードを取得
      $boards = Board::where('article_id',$id)->get();

      return view('article.show',compact('article','user','comments','boards'));
    }

// 案件記事削除
    public function destroy($id){
      $article = Article::findOrFail($id);
      $article->delete();
      return redirect()->route('top');
    }


}
