<?php

namespace App\Http\Middleware;

use Closure;
use App\Board;
use Illuminate\Support\Facades\Auth;

class BoardMiddleware
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
       $board = Board::findOrFail($id);
       $user = Auth::user();
       if($user->id !== $board->user_id && $user->id !== $board->client_id ){

         return redirect()->route('top');
       }
       return $next($request);

     }
}
