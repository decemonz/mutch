<?php

namespace App\Http\Controllers;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Article;
use App\Comment;
use App\Board;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


use Illuminate\Http\Request;

class UserController extends Controller
{

    public function show(){

      $user = Auth::user();

      $user_id = $user->id;
      // ユーザー投稿案件取得
      $articles = Article::where('user_id',$user_id)->simplePaginate(2);
      // 取引中案件ボード取得(自分が募集をかけている案件一覧)
      $client_boards = Board::where('client_id',$user_id)->get();
      // 応募中案件ボード取得(自分が応募している案件一覧)
      $apply_boards = Board::where('user_id',$user_id)->get();


      return view('prof.show',compact('user','articles','client_boards','apply_boards'));
    }

    public function edit(){
      $user = Auth::user();
      return view('prof.profEdit',compact('user'));
    }

   public function update(UserRequest $request){

    $file = $request->file('image');
    $fileName = str_random(20).'.'.$file->getClientOriginalExtension();
    // Image::make($file)->resize(200,200)->save(public_path('images/'.$fileName));
    Storage::cloud()->putFileAs('', $file, $fileName, 'public');


    // $user = Auth::user()->id;
    // User::findOrFail($user)
    Auth::user()->update($request->validated());
    Auth::user()->image = $fileName;
    Auth::user()->save();
    return redirect()->route('top');

   }
}
