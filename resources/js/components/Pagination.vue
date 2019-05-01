<template >

<div class="pagination">

  <Router-link

    v-if="! isFirstPage"
    :to="`/?page=${currentPage - 1}`"
    class="page-button"
    >&laquo; prev

  </Router-link>

  <Router-link

    v-if="! isLastPage"
    :to="`/?page=${currentPage + 1}`"
    class="page-button"
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
