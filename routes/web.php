<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





Route::group(['middleware' => 'auth'],function(){

Route::get('/', 'ArticleController@top')->name('top');

Route::get('/index/{any?}',function(){
  return view('article.index');
})->where('any','.+');

// article
Route::get('/create','ArticleController@create')->name('article.create');
Route::post('/create','ArticleController@store')->name('article.store');
Route::get('/index','ArticleController@index')->name('article.index');
Route::get('/articleEdit/{id}','ArticleController@edit')->name('article.edit');
Route::post('/articleUpdate/{id}','ArticleController@update')->name('article.update');
Route::get('/articles/{id}','ArticleController@show')->name('article.show');

// ajax
Route::get('/ajax/articles','Ajax\ArticlesController@index');
Route::get('/ajax/articles/{id}','Ajax\ArticlesController@show');
Route::get('/ajax/user/{id}','Ajax\ArticlesController@user');
Route::get('/ajax/comments/{id}','Ajax\ArticlesController@comments');
Route::get('/ajax/boards/{id}','Ajax\ArticlesController@boards');
Route::get('/ajax/currentUser/{id}','Ajax\ArticlesController@currentUser');


// comment
Route::post('/comment_delete/{id}','CommentController@destroy')->name('comment.delete');;
Route::post('/comment/{id}','CommentController@store')->name('comment.store');


// message
Route::post('/message/{id}','MessagesController@store')->name('message.store');

// user
Route::get('/prof','UserController@show')->name('user.show');
Route::get('/profEdit','UserController@edit')->name('user.edit');
Route::post('/profEdit/update','UserController@update')->name('user.update');


// board
Route::get('/board/{id}','BoardsController@show')->name('board.show');
Route::post('/board','BoardsController@store')->name('board.store');
Route::get('/show_board/{id}','BoardsController@show_board')->name('show_board');

// twitter
Route::get('/twitter','TwitterController@tweet')->name('twitter.tweet');

});

// パスワード変更画面表示用
Route::get('/email',function(){
  return view('auth.passwords.email');
})->name('email');

Auth::routes();

// 通知用
Route::get('/hello', function() {
    event(new \App\Events\ApplyPusher('テストメッセージ'));
});
