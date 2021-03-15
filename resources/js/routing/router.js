import Vue from 'vue'
import Router from 'vue-router'

// Chargement des composants des différentes routes
import Homepage from '../pages/Homepage'
import Details from '../pages/Details'
import Login from '../pages/Login'
import Register from '../pages/Register'

// Création du routing
Vue.use(Router)

export default new Router({
    routes: [
        {
            path: '/',
            name: 'homepage',
            component: Homepage
        },
        {
            path: '/details/:id',
            name: 'details',
            component: Details
        },
        {
            path: '/login',
            name: 'login',
            component: Login
        },
        {
            path: '/register',
            name: 'register',
            component: Register
        }
    ]
})