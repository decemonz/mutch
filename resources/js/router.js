import Vue from 'vue'
import VueRouter from 'vue-router'
import ArticleList from './pages/ArticleList.vue'
import ArticleDetail from './pages/ArticleDetail.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/index',
    component:ArticleList,
    // ページデータを受け取って表示するページを切り替え
    props: route => {
      const page = route.query.page
      return {
         page: /^[1-9][0-9]*$/.test(page) ? page * 1 : 1
      }
    }

  },
  {
    path: '/index/articles/:id',
    component:ArticleDetail,
    props:true
  },
]

const router = new VueRouter({
  mode:'history',
  // ページ切り替えした際にトップへ戻るよう指定
  scrollBehavior(){
    return{ x:0,y:0}
  },
  routes
})

export default router
