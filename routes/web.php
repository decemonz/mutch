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
//
// Route::get('/index/{any?}',function(){
//   return view('article.index');
// })->where('any','.+');

Route::get('/', function () {
    return view('pages.top');
});

// article
Route::get('/create','ArticleController@create')->name('article.create');
Route::post('/create','ArticleController@store')->name('article.store');
Route::get('/index','ArticleController@index')->name('article.index');
Route::get('/articles/{id}','ArticleController@show')->name('article.show');

// comment
Route::post('/comment/{id}','CommentController@store')->name('comment.store');

// message
Route::get('/message/{id}','MessageController@show')->name('message.show');

// user
Route::get('/profEdit','UserController@edit')->name('user.edit');
Auth::routes();
