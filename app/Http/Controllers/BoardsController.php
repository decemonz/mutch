<?php

namespace App\Http\Controllers;

use App\Http\Requests\BoardRequest;
use App\Board;
use App\User;
use App\Article;
use App\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BoardsController extends Controller
{
    public function store(BoardRequest $request){
      $board = Board::create($request->validated());
    return redirect()->route('board.show',$board->article_id);
    }

    public function show($id){
      $user_id = Auth::user()->id;

      $board = Board::where('article_id',$id)->where('user_id',$user_id)->first();

      $user = User::findOrFail($user_id);

      $client = User::findOrFail($board->client_id);

      $article = Article::findOrFail($board->article_id);

      $messages = Message::where('board_id',$board->id)->get();

      return view('board.show',compact('board','user','client','article','messages'));
    }

    public function show_board($id){
      $user_id = Auth::user()->id;
      $board = Board::findOrFail($id);
      $user = User::findOrFail($user_id);

      $client = User::findOrFail($board->client_id);

      $article = Article::findOrFail($board->article_id);

      $messages = Message::where('board_id',$board->id)->get();

      return view('board.show',compact('board','user','client','article','messages'));

    }
}
