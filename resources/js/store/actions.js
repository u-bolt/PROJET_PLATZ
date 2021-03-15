const actions = {
    setResources({commit}) {
        // Transaction AJAX des resources
        axios.get('api/resources')
             .then(response => commit('SET_RESOURCES', response.data))
    },
    setCategories({commit}) {
        // Transaction AJAX des catégories
        axios.get('api/categories')
             .then(response => commit('SET_CATEGORIES', response.data))
    },
    setComments({commit}) {
        // Transaction AJAX des comments
        axios.get('api/comments')
             .then(response => commit('SET_COMMENTS', response.data))
    },
    setUsers({commit}) {
        // Transaction AJAX des users
        axios.get('api/users')
             .then(response => commit('SET_USERS', response.data))
    },
    loginUser({commit}, payload) {
        commit('LOGIN_USER', payload)
    },
    logoutUser({commit}) {
        commit('LOGOUT_USER')
    }
}

export default actions