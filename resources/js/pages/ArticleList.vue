<template >
<div class="">
  <h1>http</h1>
  <div v-for="article in articles">
    {{ <article.title }}

    </article>}}
  </div>
</div>

</template>

<script>
export default {

  data(){
    return{
      articles :[],
    }
  },
  methods:{
    async fetchArticle (){
      const response = await axios.get(`/index/list`)
      this.articles = response.data
    }
  }
}
</script>

<style lang="css" scoped>
</style>
