<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

  protected $fillable = [
    'body','user_id','board_id'
  ];

  public function board(){
  return $this->belongsTo('App\Board');
}
  public function user(){
  return $this->belongsTo('App\User');
}
}
