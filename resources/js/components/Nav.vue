<template>
  <div id="wrapper-navbar">
    <div class="navbar object">
      <div id="wrapper-bouton-icon">
        <a v-if="$store.state.connectedUser" href="#"><img class="button-add" src="\assets\img\plus.svg" alt="Add resource"></a>
        <a v-if="$store.state.connectedUser && $route.name === 'details'"><img class="button-add" src="\assets\img\edit.svg" alt="Edit resource"></a>
        <a v-if="$store.state.connectedUser && $route.name === 'details'"><img class="button-add" src="\assets\img\remove.svg" alt="Delete resource"></a>
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

<style>
.button-add {
  float:left;
	width:28px;
	height:28px;
	margin-top:16px;
	margin-right:15px;
	cursor:pointer;
	opacity:1;
	 transition: all 0.2s ease-in-out;
    -webkit-transition: all 0.2s ease-in-out;
    -moz-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    -ms-transition: all 0.2s ease-in-out;
}
</style>