<template>

  <div  class="c-panel__container">

    <p class="c-article__id">No.{{ article.id }} </p>

    <RouterLink

      :to="`/index/articles/${article.id}`"
    >
      <div class="c-article__title" >
        {{ article.title}}
      </div>
      <p class="c-article__price" v-if="article.kind === 'single'">
        金額　: {{ article.low_price}}　円　~ {{ article.hi_price}}　円
      </p>
      <p class="c-article__kind" v-if="article.kind === 'single'">
        単発案件
      </p>
      <p class="c-article__kind" v-else>
        レベニューシェア案件
      </p>

      <div class="c-article__body">
        {{ article.body}}
      </div>
    </RouterLink>
  </div>

</template>

<script>
import axios from 'axios';
export default {
  props:{
    article:{
      type:Object,
      required:true
    }
  },
//   data(){
//     return{
//       kind:'single',
//       article:{},
//       user:{},
//       comments:{},
//       boards:{},
//       currentUser:'',
//       applyed:true,
//       csrf:document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
//       commentBody:'',
//     }
//   },
//   methods:{
//     // ボード情報送信
//     boardSubmit:function(){
//       var boardFormData ={
//         article_id:this.article.id,
//         client_id:this.article.user_id,
//         article_title:this.article.title,
//         user_id:this.currentUser.id,
//         _token:this.csrf,
//       };
//       axios.post('/board',boardFormData)
//       .then(
//        this.$router.go(`/board/${this.article.id}`)
//       )
//     },
//     commentSubmit:function(){
//       var commentFormData ={
//         body:this.commentBody,
//         user_name:this.currentUser.name,
//         article_id:this.article.id,
//         _token:this.csrf,
//       };
//         axios.post(`/comment/${this.article.id}`,commentFormData)
//         .then(
//          this.$router.go({name:'ArticleDetail'})
//         )
//     },
//     commentDelete:function(){
//       var commentId = document.getElementById('comment-id').value;
//       var commentDeleteData ={
//         _token:this.csrf,
//       };
//         axios.post(`/comment_delete/${commentId}`,commentDeleteData)
//         .then(
//          this.$router.go({name:'ArticleDetail'})
//         )
//     },
//     articleEdit:function(){
//       this.$router.push(`/articleEdit/${this.article.id}`)
//     },
//   },
//   mounted(){
//    var self = this;
//    var url = `/ajax/articles/${this.id}`
//     axios.get(url).then(function(response){
//      self.article = response.data
//    });
//    var url = `/ajax/user/${this.id}`
//    axios.get(url).then(function(response){
//     self.user = response.data
//   });
//   var url = `/ajax/comments/${this.id}`
//    axios.get(url).then(function(response){
//     self.comments = response.data
//   });
//   var url = `/ajax/boards/${this.id}`
//    axios.get(url).then(function(response){
//     self.boards = response.data
//   });
//   var url = `/ajax/currentUser/${this.id}`
//    axios.get(url).then(function(response){
//     self.currentUser = response.data
//   });
// },

}
</script>

<style lang="css" scoped>
</style>
