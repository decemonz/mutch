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




// 関数内のルートはログインしていなければ表示できない
Route::group(['middleware' => 'auth'],function(){

Route::get('/', 'ArticleController@top')->name('top');


// /index/~でURLを指定した場合~がどんな値でもarticle.indexを返す
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
Route::post('/article_delete/{id}','ArticleController@destroy')->name('article.delete');

// ajax(vueへデータを送る用)
Route::get('/ajax/articles','Ajax\ArticlesController@index');
Route::get('/ajax/articles/{id}','Ajax\ArticlesController@show');


// comment
Route::get('/comment/index','CommentController@index')->name('comment.index');
Route::post('/comment_delete/{id}','CommentController@destroy')->name('comment.delete');
Route::post('/comment/{id}','CommentController@store')->name('comment.store');


// message
Route::post('/message/{id}','MessagesController@store')->name('message.store');
Route::post('/message_delete/{id}','MessagesController@destroy')->name('message.delete');

// user
Route::get('/prof','UserController@show')->name('user.show');
Route::get('/profEdit','UserController@edit')->name('user.edit');
Route::post('/profEdit/update','UserController@update')->name('user.update');


// board
Route::get('/board/index','BoardsController@index')->name('board.index');
Route::get('/board/{id}','BoardsController@show')->name('board.show');
Route::post('/board','BoardsController@store')->name('board.store');
Route::get('/show_board/{id}','BoardsController@show_board')->name('show_board');

});

// パスワード変更画面表示用
Route::get('/email',function(){
  return view('auth.passwords.email');
})->name('email');

Auth::routes();
