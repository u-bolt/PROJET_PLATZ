<template>
  <div>
      <Header />
      <Nav />
      <FilterMenu />

      <div id="wrapper-container">

        <div class="container object">

            <div id="main-container-image">

                <section v-for="resource in resources" :key="resource.id" class="work">
                    <figure class="white">
                        <a href="#">
                            <img :src="`assets/img/${resource.image}`" :alt="resource.name" />
                            <dl>
                                <dt>{{ resource.name | capitalize }}</dt>
                                <dd>{{ resource.description | truncate(0, 150) }}</dd>
                            </dl>
                        </a>
                        <div id="wrapper-part-info">
                            <div class="part-info-image"><img
                                    :src="`assets/img/${categories(resource).icon}`" :alt="categories(resource).name" width="28"
                                    height="28" /></div>
                            <div id="part-info">{{categories(resource).name | capitalize }}</div>
                        </div>
                    </figure>
                </section>

                <div id="wrapper-oldnew">
                    <div class="oldnew">
                        <div class="wrapper-oldnew-prev">
                            <div id="oldnew-prev" @click="previousResources" :class="params.start === 0?'disabled':''"></div>
                        </div>
                        <div class="wrapper-oldnew-next">
                            <div id="oldnew-next" @click="nextResources" :class="params.end === $store.state.resources.length?'disabled':''"></div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <Footer />
    </div>
  </div>
</template>

<script>
import Header from '../components/Header'
import FilterMenu from '../components/FilterMenu'
import Nav from '../components/Nav'
import Footer from '../components/Footer'

export default {
    name: "Homepage",
    components: {
        Header,
        FilterMenu,
        Nav,
        Footer
    },
    data() {
        return {
            params: {
                show: 20,
                start: 0,
                end: 20
            }
        }
    },
    computed: {
        resources() {
            // Return les n resources en fonction des params
            return this.$store.getters.getResources(this.params)
        },
        categories() {
            return function(resource) {
                // Return les ressources correspondants à la resource demandée
                return this.$store.getters.getCategoriesByResourcesId(resource)
            }
        }
    },
    methods: {
        nextResources() {
            if(this.params.end >= this.$store.state.resources.length){
                this.params.start
                this.params.end
            }
            else{
                this.params.start += this.params.show
                this.params.end += this.params.show
                window.scroll(0,0)
            }
        },
        previousResources() {
            if(this.params.start === 0) {
                this.params.start = 0
                this.params.end = this.params.show
            }
            else{
                this.params.start -= this.params.show
                this.params.end -= this.params.show
                window.scroll(0,0)
            }
        }
    },
    filters: {
        // Majuscule du premier caractère
        capitalize(str) {
            return str.charAt(0).toUpperCase() + str.slice(1)
        },
        // Tronque le texte
        truncate(str, start, end) {
            return str.substring(start, end) + "..."
        },
    },
    created() {
        this.$store.dispatch('setCategories')
        this.$store.dispatch('setResources')
    }
}
</script>

<style>
 .disabled {
     pointer-events: none;
     opacity: 0.5;
 }
</style>