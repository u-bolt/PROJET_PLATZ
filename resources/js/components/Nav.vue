<template>
    <div id="wrapper-navbar">
        <div class="navbar object">
            <div id="wrapper-bouton-icon">

                <router-link to="/add" v-if="$store.state.connectedUser">
                    <img class="button-resource button-add" src="\assets\img\plus.svg" alt="Add resource">
                </router-link>

                <router-link :to="`/edit/${resourceId}`" v-if="$store.state.connectedUser && $route.name === 'details'">
                    <img class="button-resource" src="\assets\img\edit.svg" alt="Edit resource">
                </router-link>

                <a v-if="$store.state.connectedUser && $route.name === 'details'">
                    <img v-on:click="supprimer()" class="button-resource" src="\assets\img\remove.svg" alt="Delete resource">
                </a>

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
        props: ['resourceId'],
        data() {
            return {
              params: {
                  id: ''
              }
              
            }
        },
        computed: {
            categories() {
                // Return toutes les categories 
                return this.$store.getters.getCategories()
            },

        },
        methods: {
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

<style>
    .button-resource {
        float: left;
        width: 28px;
        height: 28px;
        margin-top: 16px;
        margin-right: 15px;
        cursor: pointer;
        opacity: 1;
        transition: all 0.2s ease-in-out;
        -webkit-transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out;
        -ms-transition: all 0.2s ease-in-out;
    }

    .button-add {
        margin-left: 20px;
    }

</style>
