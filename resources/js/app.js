
import Vue from 'vue'
// import './bootstrap'
import router from './router'
// import store from './store'
import App from './App.vue'


// 案件一覧表示用
new Vue({
    el: '#app',
    router,
    // store,
    components:{App},
    template:'<App />'
})

// logout送信用
new Vue({
    el: '#logout',
    methods:{
      logout:function(event){
        event.preventDefault();
        document.getElementById('logout-form').submit();
      }
    }
})
