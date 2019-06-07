
import Vue from 'vue'
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

// フォーム入力バリデーション用
new Vue({
  el:'#form',
  data:{
    kind:'single',
    hi_price:'',
    low_price:'',
    validate:false,
  },
})

function confirm(){
	if(window.confirm('削除してよろしいですか？')){ // 確認ダイアログを表示
		return true; // 「OK」時は送信を実行
	}
	else{ // 「キャンセル」時の処理
		window.alert('キャンセルされました'); // 警告ダイアログを表示
		return false; // 送信を中止
	}
}
