<template>


<div class="show">

    <div class="c-panel__container" >

        <p class="p-show__number">No.{{ article.id }}</p>

        <!-- 案件登録者とログインユーザーが同じ場合のみ編集ボタンを表示 -->
        <a　v-if="article.user_id === currentUser.id" href="">
          <button class="p-small__btn p-show__edit" @click="articleEdit">編集</button>
        </a>


        <a id="tweet" @click="tweet"　class="tweet__btn" target="newwindow" style="color:white;" href="https://twitter.com/intent/tweet?url=https://stark-headland-31167.herokuapp.com/index/articles/"><i class="fab fa-twitter" style="margin-right:3px;"></i>tweet</a>



        <p class="p-show__title">{{ article.title }}</p>

        <h1 class="p-show__label">投稿者</h1>
        　 <p class="p-show__contents">{{ user.name }}</p>

        <h1 class="p-show__label">案件種別</h1>


        <div class="p-show__contents" v-if="article.kind === 'single' ">
            単発案件
        </div>
        <div class="p-show__contents"　v-else>
            レベニューシェア案件
        </div>




    　　
        <h1 class="p-show__label" v-if="article.kind === 'single' ">金額</h1>

        　 <p class="p-show__contents" v-if="article.kind === 'single' ">{{ article.hi_price }}円　〜　{{ article.low_price }}円</h1>

      　<h1 class="p-show__label">内容</h1>

          <p class="p-show__contents">

            {{ article.body }}

          </p>




      <!-- ログインユーザーが投稿した記事の場合は応募できないようにする -->
<div v-if=" article.user_id !== currentUser.id">



    <div v-for="board in boards">

        <!-- ボードidに現在ログインユーザーidが存在する場合は応募済みのため取引メッセージへのリンクを表示 -->
        <!--  boardの中身が取得できて入れば応募済みのため変数applyedをfalseにして応募ボタンを非表示にする-->

          <a :href="`/show_board/${board.id}`" v-if="board.user_id === currentUser.id" :v-bind="applyed = false">
              <button name="button" class="c-btn">取引メッセージへ
              </button>
          </a>

    </div>


      <!--  上記boardの中身が表示されていなければ変数applyedはtrueのため応募ボタンを表示-->
      <div class=""  v-if="applyed === true">

        <form class="" action="" method="post" @submit.prevent="submit">
        <input type="hidden" name="_token" :value="csrf">
          <input type="text" name="article_id" style="display:none;">
          <input type="text" name="client_id" style="display:none;" >
          <input type="text" name="user_id"  style="display:none;">
          <input type="text" name="article_title" style="display:none;">
          <button type="text" name="button" class="c-btn" @click="boardSubmit" >応募する</button>
        </form>

      </div>

</div>




        <div class="panel-body">

          <!-- @if($errors->any())
          <div class="alert alert-danger">

            @foreach($errors->all() as $message)
             <p>{{ $message }}</p>
            @endforeach

          </div>
          @endif -->

        <form class="" action="" method="post"  @submit.prevent="submit">

           <input type="hidden" name="_token" :value="csrf">

            <div class="c-form__group">
              <label for="body">コメント</label>
              <textarea name="body" rows="8" cols="65" class="c-form__area" v-model="commentBody"></textarea>
            </div>

            <input type="text" name="user_name" :value="user.name" style="display:none;">

            <input type="text" name="article_id" :value="article.id" style="display:none;">
            <div class="text-right">
              <button type="submit" name="button" class="p-small__btn btn-primary" @click="commentSubmit">投稿</button>
            </div>

          </form>
        </div>


    <div v-if="comments.length > 0" class="p-comment__label">コメント一覧</div>


    <div class="p-comment__container">

      <div v-for="comment in comments" class="p-comment__items" >

        <p class="p-comment__name" style=""></p>
        <p class="p-comment__name">name:{{ comment.user_name}}</p>
        <p class="p-comment__text">{{ comment.body }}</p>
        <p class="p-comment__date">{{ comment.created_at }}</p>

        <form class="" v-if="comment.user_name === currentUser.name" action="" method="post"  @submit.prevent="submit">
           <input type="hidden" name="_token" :value="csrf">
           <input type="hidden" id="comment-id" :value="comment.id" />
          <button type="submit" @click="commentDelete" name="button" class="p-comment__delete btn-primary">削除</button>
        </form>

      </div>


    </div>
  </div>

  <div class="back__btn">
      <a class="pagi__button" @click="back"> &laquo; Back</a>
  </div>

</div>

</template>

<script>
import axios from 'axios';
export default {
  props:{
    id:{
      rype:String,
      required:true
    }
  },
  data(){
    return{
      // 案件種別表示用の初期値
      kind:'single',
      article:{},
      user:{},
      comments:false,
      boards:{},
      currentUser:'',
      applyed:true,
      // headのmetaタグに記載しているcsrfトークンの値をjsで取得
      csrf:document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      commentBody:'',
    }
  },
  methods:{
    // ボード情報送信
    boardSubmit:function(){
      var boardFormData ={
        article_id:this.article.id,
        client_id:this.article.user_id,
        article_title:this.article.title,
        user_id:this.currentUser.id,
        _token:this.csrf,
      };
      axios.post('/board',boardFormData)
      .then(
       this.$router.go(`/board/${this.article.id}`)
      )
    },
    // コメント投稿
    commentSubmit:function(){
      var commentFormData ={
        body:this.commentBody,
        user_name:this.currentUser.name,
        article_id:this.article.id,
        _token:this.csrf,
      };
        axios.post(`/comment/${this.article.id}`,commentFormData)
        .then(
         this.$router.go({name:'ArticleDetail'})
        )
    },
    // コメント削除
    commentDelete:function(){
      var commentId = document.getElementById('comment-id').value;
      var commentDeleteData ={
        _token:this.csrf,
      };
        axios.post(`/comment_delete/${commentId}`,commentDeleteData)
        .then(
         this.$router.go({name:'ArticleDetail'})
        )
    },
    back:function(){
       this.$router.go({name:'ArticleList'})
    },
    // 編集ページへのリンク
    articleEdit:function(){
      this.$router.push(`/articleEdit/${this.article.id}`)
    },
    // ツイッターシェアボタンへのリンク
    tweet:function(){
      document.getElementById('tweet').href+=this.article.id+"&text="+this.article.title;
    },
  },
  // laravelよりajaxで送ったデータを変数に格納
   mounted(){
    var self = this;
    var url = `/ajax/articles/${this.id}`
     axios.get(url).then(function(response){
      self.article = response.data
    });
    var url = `/ajax/user/${this.id}`
    axios.get(url).then(function(response){
     self.user = response.data
   });
   var url = `/ajax/comments/${this.id}`
    axios.get(url).then(function(response){
     self.comments = response.data
   });
   var url = `/ajax/boards/${this.id}`
    axios.get(url).then(function(response){
     self.boards = response.data
   });
   var url = `/ajax/currentUser/${this.id}`
    axios.get(url).then(function(response){
     self.currentUser = response.data
   });
 },

}
</script>

<style>

</style>
