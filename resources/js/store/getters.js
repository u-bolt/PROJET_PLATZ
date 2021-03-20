const getters = {
    // RESOURCES
    getResources(state) {
        // Return les n ressources
        return function({start, end}) {
            let resources = {...state.resources.slice(start, end)}
            return resources
        }
    },
    getResourceById(state) {
        return function (data) {
            return state.resources.find(resource => resource.id == data);
          } 
    },
    getResourcesByCategoriesId(state) {
        // Return les ressource en fonction de la categorie_id
        return function({categorie, start, end}){
            return [...state.resources.filter(resource => resource.categorie_id == categorie).slice(start,end)]
        }

    },
    // CATEGORIES
    getCategories(state) {
        // Return les catégories
        return function() {
            return state.categories
        }
    },
    getCategoriesByResourcesId(state) {
        // Return la catégorie en fonction de la categorie_id
        return function(data) {
            return state.categories.find(categorie => categorie.id === data.categorie_id)
        }
    },
    // COMMENTS
    getCommentsByResourcesId(state) {
        // Return du user en fonction du user_id
        return function(data) {
             return state.comments.filter(comment => comment.resource_id == data.id)
        }
    },
    // USERS
    getUsersByResourcesId(state) {
        // Return du user en fonction du user_id
        return function(data) {
            return state.users.find(user => user.id == data.user_id)
        }
    },
    getUsersByCommentId(state) {
        // Return du user en fonction du comment_id
        return function(data) {
            return state.users.find(user => user.id == data.user_id)
        }
    }
}



export default getters