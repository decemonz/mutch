import Vue from 'vue'
import VueRouter from 'vue-router'
import ArticleList from './pages/ArticleList.vue'
import ArticleDetail from './pages/ArticleDetail.vue'
import Notice from './pages/notice.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/index',
    component:ArticleList,
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
  {
    path: '/index/articles/:id',
    component:ArticleDetail,
    props:true
  },
  {
    path: '/index/notices',
    component:Notice,
    props:true
  },
]

const router = new VueRouter({
  mode:'history',
  scrollBehaver(){
    return{ x:0,y:0}
  },
  routes
})

export default router
