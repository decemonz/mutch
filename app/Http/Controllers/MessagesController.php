<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MessageRequest;
use App\Message;
use App\Article;

class MessagesController extends Controller
{
    public function store(MessageRequest $request,$id){

        $message = Message::create($request->validated());


        return redirect()->route('show_board',$message->board_id);
    }

}
