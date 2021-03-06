const mutations = {
    SET_RESOURCES(state, payload) {
        // Hydratation des ressources
        state.resources = payload
    },
    SET_CATEGORIES(state, payload) {
        // Hydratation des catégories
        state.categories = payload
    },
    SET_COMMENTS(state, payload) {
        // Hydratation des comments
        state.comments = payload
    },
    SET_USERS(state, payload) {
        // Hydratation des users
        state.users = payload
    },
    LOGIN_USER(state, payload) {
        state.connectedUser = {...payload.user}
    },
    LOGOUT_USER(state, payload) {
        state.connectedUser = null
    }
}

export default mutations