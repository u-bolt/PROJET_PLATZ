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
    }
}

export default actions