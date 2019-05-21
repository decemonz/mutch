<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Mail;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','body','image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

// 案件記事とのリレーション
    public function articles(){
      return $this->hasMany('App\Article');
    }
    public function messages(){
      return $this->hasMany('App\Message');
    }

    public function board(){
      return $this->hasOne('App\Board');
    }
    public function client(){
      return $this->hasOne('App\Board','board_user','client_id','id');
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // パスワード再設定メールを送信する
    public function sendPasswordResetNotification($token)
    {
      Mail::to($this)->send(new ResetPassword($token));
    }
}
