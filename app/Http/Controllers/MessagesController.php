<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MessageRequest;
use App\Message;
use App\Article;

class MessagesController extends Controller
{

  // ログインユーザー以外がアクセスできないよう制御
    public function __construct()
      {
          $this->middleware('message')
              ->except('store');
      }

// メッセージ作成
    public function store(MessageRequest $request,$id){

        $message = Message::create($request->validated());
        // メッセージボードに遷移
        return redirect()->route('show_board',$message->board_id);
    }

// メッセージ削除
    public function destroy($id){

      $message = Message::findOrFail($id);

      $message->delete();

     return redirect()->route('show_board',$message->board_id);
    }

}
