<template>

 <div id="articles">
   <div class="c-article__sort">
     <!-- ソートボタン -->
     <button  name="button" class="sort__btn" @click="sortSingle">単発</button>
     <button  name="button" class="rev__btn" @click="sortRevenue">レベニューシェア</button>
     <button  name="button" class="rev__btn-md" @click="sortRevenue">レベ</button>
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
<!-- ページネーション -->
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
    async fetchArticles(){
      const response = await axios.get(`/ajax/articles/?page=${this.page}`)
      this.articles = response.data.data
      this.currentPage = response.data.current_page
      this.lastPage = response.data.last_page
    },
    },
    watch:{
      $route:{
        async handler(){
          await this.fetchArticles()
        },
        immediate:true
      }
    }
  }
</script>

<style lang="css" scoped>
</style>
