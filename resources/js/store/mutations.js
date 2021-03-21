const mutations = {
    SET_RESOURCES(state, payload) {
        payload.sort((a, b) => new Date(b.created_at) - new Date(a.created_at))
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
        console.log(payload)
        state.connectedUser = payload
        console.log(state.connectedUser);
    },
    LOGOUT_USER(state, payload) {
        state.connectedUser = null
    },
    ADD_COMMENT(state, payload) {
        state.comments.push(payload)
    }
}

export default mutations