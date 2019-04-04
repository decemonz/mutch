<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Article;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    //

    public function register(){
      return view('article.article_register');
    }

    public function create(ArticleRequest $request){
      $article = new Article();
      return redirect()->route('/',['id' => $article->id]);
    }
}
