<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{

  protected $fillable = [
    'article_id','user_id','client_id','article_title'
  ];

    public function article(){
    return $this->belongsTo('App\Article');
  }
    public function messages(){
    return $this->hasMany('App\Message');
  }
    public function user(){
    return $this->hasOne('App\User');
  }
    public function client(){
    return $this->hasOne('App\User','user_board','id','client_id');
  }
}
