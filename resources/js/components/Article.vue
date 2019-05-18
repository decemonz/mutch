<template>

  <div  class="c-panel__container">

    <p class="c-article__id">投稿日時 : {{ article.created_at | moment }} </p>

    <RouterLink

      :to="`/index/articles/${article.id}`"
    >
      <div class="c-article__title" >
        {{ article.title}}
      </div>
      <p class="c-article__price" v-if="article.kind === 'single'">
        金額　: {{ article.low_price}}　円　~ {{ article.hi_price}}　円
      </p>
      <p class="c-article__kind" v-if="article.kind === 'single'">
        単発案件
      </p>
      <p class="c-article__kind" v-else>
        レベニューシェア案件
      </p>

      <div class="c-article__body" v-text="article.body">

      </div>
    </RouterLink>
  </div>

</template>

<script>
import axios from 'axios';
import moment from 'moment';

export default {
  props:{
    // 親コンポーネントからarticeデータを受け取り
    article:{
      type:Object,
      required:true
    }
  },
  // 日付データをフォーマットする用
  filters:{
    moment: function(date){
      return moment(date).format('YYYY/MM/DD HH:mm');
    }
  },

}
</script>

<style lang="css" scoped>
</style>
