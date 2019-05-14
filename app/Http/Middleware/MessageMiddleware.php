<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Message;

class MessageMiddleware
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
       $message = Message::findOrFail($id);
       $user = Auth::user();
       if($user->id !== $message->user_id){

         return redirect()->route('top');
       }
       return $next($request);

     }
}
