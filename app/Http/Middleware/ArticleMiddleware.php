<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Article;

class ArticleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      $id = $request->route()->parameter('id');
      $article = Article::findOrFail($id);
      $user = Auth::user();
      if($user->id !== $article->user_id){

        return redirect()->route('top');
      }
      return $next($request);

    }
}
