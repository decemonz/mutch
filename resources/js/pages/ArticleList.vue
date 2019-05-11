<template>

 <div id="articles">
   <div class="c-article__sort">
     <button  name="button" class="sort__btn" @click="sortSingle">単発</button>
     <button  name="button" class="sort__btn" @click="sortRevenue">サービス開発</button>
     <button  name="button" class="sort__btn" @click="sortDefault">全件</button>
   </div>

   <div class="c-article__title">
     案件一覧

   </div>


     <Article

        v-for="article in articles"
        :key="article.id"
        :article="article"
        v-if="article.kind !== sort"

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
      sort:'',
      currentPage:0,
      lastPage: 0
    }
  },
  methods:{
    sortSingle:function(){
     this.sort = 'revenue'
    },
    sortRevenue:function(){
    this.sort = 'single'
    },
    sortDefault:function(){
    this.sort = ''
    },
  },
  mounted(){
    this.$nextTick(function(){

      var self = this;
      var url = `/ajax/articles/?page=${self.page}`
      axios.get(url).then(function(response){
        self.articles = response.data.data
        self.currentPage = response.data.current_page
        self.lastPage = response.data.last_page
      });

    });

  },
  updated(){
    var self = this;
    var url = `/ajax/articles/?page=${self.page}`
    axios.get(url).then(function(response){
      self.articles = response.data.data
      self.currentPage = response.data.current_page
      self.lastPage = response.data.last_page
    });
  },
}
</script>

<style lang="css" scoped>
</style>
