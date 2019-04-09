<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
      protected $fillable = [
      'title','body','hi_price','low_price','kind',
    ];

      // ユーザーとのリレーション
      public function user(){
      return $this->belongsTo('App\User');
    }

      public function comments(){
      return $this->hasMany('App\Comment');
}


}
