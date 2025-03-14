/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 import router from './routing/router'
 import store from './store/store'
 // Plugin vue pour les notifications
 import Notifications from 'vue-notification'

 Vue.use(Notifications)

const app = new Vue({
    el: '#app',
    router,
    store,
    created() {
        if(sessionStorage.getItem('user')) {
            let temp = sessionStorage.getItem('user')
            let temp_json = JSON.parse(temp)
            this.$store.dispatch('loginUser', temp_json)
        }
        this.$store.dispatch('setCategories')
        this.$store.dispatch('setResources')
        this.$store.dispatch('setComments')
        this.$store.dispatch('setUsers')
    }
});
