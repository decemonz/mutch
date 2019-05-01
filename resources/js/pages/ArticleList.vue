<template>

 <div id="articles">

   <div class="c-article__title">
     案件一覧
   </div>

     <Article

        v-for="article in articles"
        :key="article.id"
        :article="article"

     />

<Pagination :current-page="currentPage" :last-page="lastPage" />

 </div>



</template>

<script>
import axios from 'axios';
import Pagination from '../components/Pagination.vue'
import Article from '../components/Article.vue'

export default {
  components:{
    Article,
    Pagination
  },
  props:{
    page:{
      type:Number,
      required:false,
      default:1
    }
  },
  data(){
    return{
      articles:[],
      currentPage:0,
      lastPage: 0
    }
  },
   mounted(){
    var self = this;
    var url = `/ajax/articles`
    axios.get(url).then(function(response){
      self.articles = response.data
      // self.currentPage = response.data.current_page
      // self.lastPage = response.data.last_page
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
