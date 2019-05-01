<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TwitterRequest;
use App\Article;
use App\User;
use App\Board;
use Illuminate\Support\Facades\Auth;
use Abraham\TwitterOAuth\TwitterOAuth;

class TwitterController extends Controller
{
  public function tweet(Request $request){
    $twitter = new TwitterOAuth(env('TWITTER_API_KEY'),
          env('TWITTER_SECRET_KEY'),
          env('TWITTER_ACCESS_TOKEN'),
          env('TWITTER_TOKEN_SECRET'));

      $twitter->post("statuses/update", [
          "status" =>
              'New Photo Post!' . PHP_EOL .
              '新しい聖地の写真が投稿されました!' . PHP_EOL .
              'タイトル「」' . PHP_EOL .
              '#photo #anime #photography #アニメ #聖地 #写真 #HolyPlacePhoto' . PHP_EOL .
              'https://www.holy-place-photo.com/photos/'
      ]);
    }
}
