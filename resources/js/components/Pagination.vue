<template >

<div class="pagination mt-3">

  <Router-link

    v-if="! isFirstPage"
    :to="`/index/?page=${currentPage - 1}`"
    class="pagi__button"
    >&laquo; prev

  </Router-link>

  <Router-link

    v-if="! isLastPage"
    :to="`/index/?page=${currentPage + 1}`"
    class="pagi__button"
    >next &raquo;

  </Router-link>

</div>

</template>

<script>
export default {

  props:{
    currentPage:{
      type:Number,
      required: true
    },
    lastPage:{
      type:Number,
      required: true
    },
  },
  computed:{
    isFirstPage(){
      return this.currentPage === 1
    },
    isLastPage(){
      return this.currentPage === this.lastPage
    }
  }
}
</script>
