
{{  App\User::find($board->user_id)->name}}さんより
{{ $board->article_title}}への応募がありました -->
<a href="http://localhost:8888/show_board/{{$board->id}}">メッセージリンク</a>
