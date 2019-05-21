<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

      protected $perPage = 3;

      protected $fillable = [
      'title','body','hi_price','low_price','kind',
    ];

      // ユーザーとのリレーション
      public function user(){
      return $this->belongsTo('App\User');
    }
      // コメントとのリレーション
      public function comments(){
      return $this->hasMany('App\Comment')->orderBy('created_at','DESC');
}
      // ボードとのリレーション
      public function boards(){
      return $this->hasMany('App\Board');
}


}
