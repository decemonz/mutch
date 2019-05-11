<?php

namespace App\Http\Controllers;

use App\Http\Requests\BoardRequest;
use App\Board;
use App\User;
use App\Article;
use App\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Mail\BoardMail;
use Illuminate\Support\Facades\Mail;

class BoardsController extends Controller
{

    public function __construct()
      {
          $this->middleware('board')
              ->except(['index', 'store']);
      }

    public function store(BoardRequest $request){

      $board = Board::create($request->validated());

      $user = User::find($board->user_id);

      Mail::to($user->email)
                ->send(new BoardMail($board));

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

    public function index(){

      $user = Auth::user();

      $user_id = $user->id;

      // 取引中案件ボード取得(自分が募集をかけている案件一覧)
      $client_boards = Board::where('client_id',$user_id)->get();
      // 応募中案件ボード取得(自分が応募している案件一覧)
      $apply_boards = Board::where('user_id',$user_id)->get();


      return view('board.index',compact('user','client_boards','apply_boards'));

    }
}
