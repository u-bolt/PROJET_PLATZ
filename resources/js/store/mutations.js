const mutations = {
    SET_RESOURCES(state, payload) {
        // Hydratation des ressources
        state.resources = payload
    },
    SET_CATEGORIES(state, payload) {
        // Hydratation des catégories
        state.categories = payload
    }
}

export default mutations