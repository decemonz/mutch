
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

// 通知用

Pusher.logToConsole = true;

var pusher = new Pusher('8f531320589dac674c15', {
  cluster: 'ap3',
  forceTLS: true
});

var channel = pusher.subscribe('my-channel');
channel.bind('my-event', function(data) {
  $.notify(data.message, 'info');
});
