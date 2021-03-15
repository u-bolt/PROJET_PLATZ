<template>
  <div id="wrapper-navbar">
    <div class="navbar object">
      <div id="wrapper-bouton-icon">

        <div id="bouton-ai" v-for="categorie in categories" :key="categorie.id">
          <img v-on:click="filter(categorie.id)" :src="`assets/img/${categorie.icon}`" :alt="`${categorie.name}`" :title="`${categorie.name}`" height="28" width="28">
        </div>

        <div id="bouton-premium">
          <img v-on:click="noFilter()" src="assets/img/icon-premium.svg" alt="premium" title="Premium" height="28" width="28">
        </div>

      </div>
    </div>
  </div>
</template>

<script>
export default {
    name: "Nav",
    data() {
      return {

      }
    }, 
    computed : {
      categories() {
        // Return toutes les categories 
        return this.$store.getters.getCategories()
      }
    },
    methods: {
      filter(data) {
          return this.$emit('filter', data)   
      },
      noFilter() {
          return this.$emit('filter', null)  
      }
    }
}
</script>
