<template>
  <div>
      <form>
        <input @keyup="search" v-model="value" type="text" name="search" id="tip_search_input" list="search" autocomplete=off required>
      </form>
      <div class="search-container" @click.stop="">
        <ul v-if="search">
            <li v-for="s in searchData" :key="s.id" @click="close">
                <router-link :to="`/details/${s.id}`"><img class="search-icon" :src="`assets/img/${categories(s).icon}`" :alt="categories(s).name"> {{s.name}}</router-link>
            </li>
        </ul>
      </div>
  </div>
</template>

<script>
export default {
    name: 'Search',
    data() {
        return {
            timer: null,
            debounce: 300,
            value: '',
            searchData: null
        }
    },
    computed: {
        categories() {
            return function (resource) {
                // Return les ressources correspondants à la resource demandée
                return this.$store.getters.getCategoriesByResourcesId(resource)
            }
        }
    },
    methods: {
        search() {
            clearTimeout(this.timer)
            this.timer = null
            this.searchData = null
            if(this.value) {
                this.timer = setTimeout(() => {
                    axios.get('api/search', {params: {search: this.value}})
                         .then(response => {
                             this.searchData = response.data
                         })
                }, this.debounce)
            }
        },
        close() {
            this.value = ''
            this.searchData = null
            this.timer = null
        }
    }
}
</script>

<style>
.search-container {
    background: #2E2D30;
    position: relative;
    right: 5.7em;
    display: flex;
    border-radius: 5px;
    margin-top: 20px;
    z-index: 9998;
    width: 20em;
}
.search-container ul {
    background: #515055;
    border-radius: 5px;
    width: 20em;
}

.search-container ul li a {
    display: block;
    color: #fff;
    border-radius: 5px;
    padding: 15px;
}

.search-container ul li a:hover {
    background: #7e7c85;
}

.search-icon {
    width:20px;
	height:20px;
    margin-right: 15px;
}
</style>