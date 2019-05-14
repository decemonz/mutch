<?php

namespace App\Http\Middleware;

use Closure;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class CommentMiddleware
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
       $comment = Comment::findOrFail($id);
       $user = Auth::user();
       if($user->name !== $comment->user_name){

         return redirect()->route('top');
       }
       return $next($request);

     }
}
