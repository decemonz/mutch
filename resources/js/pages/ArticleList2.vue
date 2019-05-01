<template >

 <div id="articles">

   <div class="c-article__title">
     案件一覧
   </div>


 <div v-for="article in articles" class="c-panel__container">
   <p class="c-article__id">No.{{ article.id }} </p>

   <RouterLink :to="`/index/articles/${article.id}`">
     <div class="c-article__title" >
       {{ article.title}}
     </div>
     <p class="c-article__price" v-if="article.kind === 'single'">
       金額　: {{ article.low_price}}　円　~ {{ article.hi_price}}　円
     </p>
     <p class="c-article__kind" v-if="article.kind === 'single'">
       単発
     </p>
     <p class="c-article__kind" v-else>
       レべニューシェア
     </p>

     <div class="c-article__body">
       {{ article.body}}
     </div>
   </RouterLink>
 </div>


 </div>


</div>

</template>

<script>
import axios from 'axios';
import Pagination from '../components/Pagination.vue'

export default {
  components:{
    Pagenation
  },
  data(){
    return{
      articles:{},
    }
  },
   mounted(){
    var self = this;
    var url = '/ajax/articles'
    axios.get(url).then(function(response){
      self.articles = response.data
    });

    this.getMessages();

    Echo.channel('apply')
    .listen('ApplyPusher',(e)=> {
      this.getMessages();
      console.log(this.getMessages());
    });
  },
}
</script>

<style lang="css" scoped>
</style>
