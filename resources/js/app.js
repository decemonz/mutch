
import Vue from 'vue'
import './bootstrap'
import router from './router'
import App from './App.vue'
import axios from 'axios';
import ArticleList from './pages/ArticleList.vue'


// 案件一覧表示用
new Vue({
    el: '#app',
    router,
    components:{App},
    template:'<App />',
    data:{
      articles:{}
    },


})


// 案件種別選択用
new Vue({
  el:'#kind',
  data:{
    kind:'single'
  },
})

// ハンバーガーメニュー切り替え,ログアウト用
new Vue({
  el:'#js-logout',
  data(){
    return{
          isActive:false,
    }
  },
  methods:{
    logout:function(event){
      event.preventDefault();
      document.getElementById('logout-form').submit();
    },
  },
})
// footerログアウト用
new Vue({
  el:'#js-logout-footer',
  methods:{
    logout:function(event){
      event.preventDefault();
      document.getElementById('logout-form-footer').submit();
    },
  },
})
