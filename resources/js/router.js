import Vue from 'vue'
import VueRouter from 'vue-router'
import ArticleList from './pages/ArticleList.vue'
import ArticleDetail from './pages/ArticleDetail.vue'
import Notice from './pages/notice.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/index/list',
    component:ArticleList,
    props: true,

  },
  {
    path: '/article/:id',
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
