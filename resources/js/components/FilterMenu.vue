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

                <div class="liens-menu" >
                    <router-link to="/add" v-if="$store.state.connectedUser">
                        Ajouter un ressource
                    </router-link>
                </div>

                <div class="liens-menu">
                    <router-link :to="`/edit/${resourceId}`" v-if="$store.state.connectedUser && $route.name === 'details'">
                        Modifier la resource
                    </router-link>
                </div>

                <div class="liens-menu">
                    <a v-if="$store.state.connectedUser && $route.name === 'details'">
                         <div v-on:click="supprimer()">Supprimer la ressource</div>
                     </a>
                </div> 

                <div id="main-premium-ressource">
                    <div class="premium-ressource" >
                        <a  @click="showMenu"  v-on:click="noFilter()" href="#">Catégories</a>
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
        props: ['resourceId'],
        data() {
            return {
                menu: 'menu-cache',
                    params: {
                    id: ''
                }
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
            },
            supprimer() {
                this.params.id = this.resourceId
                axios.post('/api/delete', this.params)
                .then(response => {
                      // Notification si OK
                      this.$notify({
                          title: 'Thank you !',
                          text: 'The resource has been deleted!',
                          type: 'success',
                          speed: 600
                      })
                  })
                  .catch(() => {
                      // Notification si problème durant la transaction
                      this.$notify({
                          title: 'Oups...',
                          text: 'There is a problem during deletion',
                          type: 'error',
                          speed: 600
                      })
                  })
                 this.$router.push("/")  
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

  .liens-menu {
        text-align:center;
        font-family: Helvetica, sans-serif;
        font-size: 16px;
        margin-bottom: 15px;
    }

    .liens-menu a {
        color: #fff;
    }

    .liens-menu a:hover {
        color: #74BDEC;
    }




</style>
