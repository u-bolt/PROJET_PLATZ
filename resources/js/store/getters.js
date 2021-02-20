const getters = {
    getResources(state) {
        // Return les n ressources
        return function({start, end}) {
            let resources = {...state.resources.slice(start, end)}
            return resources
        }
    },
    getCategories(state) {
        // Return les catégories
        return state.categories
    },
    getCategoriesByResourcesId(state) {
        // Return la catégorie en fonction de la categorie_id
        return function(data) {
            return state.categories.find(categorie => categorie.id === data.categorie_id)
        }
    }
}

export default getters