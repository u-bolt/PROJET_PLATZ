import Vue from 'vue'
import Router from 'vue-router'

// Chargement des composants des différentes routes
import Homepage from '../pages/Homepage'

// Création du routing
Vue.use(Router)

export default new Router({
    routes: [
        {
            path: '/',
            name: 'homepage',
            component: Homepage
        }
    ]
})