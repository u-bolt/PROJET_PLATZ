<template>
    <div>
        <div @click="showMenu" id="stripes"></div>
        <div v-bind:class="[menu ? 'menu-cache' : 'menu-affiche']" id="main-container-menu" >
            <div class="container-menu">

                <div id="main-cross" >
                    <div @click="showMenu" id="cross-menu"></div>
                </div>

                <div id="main-small-logo">
                    <div class="small-logo"></div>
                </div>

                <div id="main-premium-ressource">
                    <div class="premium-ressource" >
                        <a  @click="showMenu"  v-on:click="noFilter()" href="#">Premium resources</a>
                    </div>
                </div>

                <div id="main-ai" v-for="categorie in categories" :key="categorie.id">
                    <div class="ai">
                        <a  @click="showMenu"  v-on:click="filter(categorie.id)" href="#">{{ categorie.name }}</a>
                    </div>
                </div>


            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: "FilterMenu",
        data() {
            return {
                menu: 'menu-cache'
            }
        },
        computed: {
            categories() {
                return this.$store.getters.getCategories()
            }
        },
        methods: {
            showMenu() {
                this.menu = !this.menu
            },
            filter(data) {
                return this.$emit('filter', data)
            },
            noFilter() {
                return this.$emit('filter', null)
            }
        }
    }

</script>

<style scoped>
   
    .menu-affiche {
        left: 0;
        z-index: 10000 !important;
    }

    .menu-cache {
        left: -100%;
         /* left: 0; */
        z-index: 10000 !important;
    }

</style>
