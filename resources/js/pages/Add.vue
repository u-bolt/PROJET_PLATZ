<template>
  <div class="container-add">
      <h2 id="title-add">Platz</h2>
      <h3 id="title-add-resource">Ajouter une ressource</h3>

      <form action="#" @submit.prevent="add" class="add-form">
          <input v-model="formData.name" type="text" placeholder="name"/>
          <textarea v-model="formData.description" name="" placeholder="description" cols="30" rows="10"></textarea>
          <!-- <label for="file" class="label-file">-- Choisir une image --</label> -->
          <!-- <input id="file" class="input-file" type="file"/> -->
          <select v-model="formData.categorie" id="options">
              <option value="">-- Catégorie --</option>
              <option v-for="categorie in categories" :key="categorie.id"  :value="categorie.id">{{categorie.name}}</option>
          </select>
          <button id="submit">Ajouter</button>
      </form>

  </div>
</template>

<script>
export default {
    name: 'Add',
    data() {
        return {
            formData: {
              name: '',
              description: '',
              categorie: '',
              user: ''
            }
        }
    },
    computed: {
        categories() {
            // Return les ressources correspondants à la resource demandée
            return this.$store.getters.getCategories()
        }
    },
    methods: {
        add() {
          this.formData.user = this.$store.state.connectedUser.id
          axios.post('/api/add', this.formData)
               .then(response => {
                    // Notification si OK
                    this.$notify({
                      title: 'Thank you !',
                      text: 'The resource has been added!',
                      type: 'success',
                      speed: 600
                      })
                })
                .catch(() => {
                         // Notification si problème durant la transaction
                        this.$notify({
                                title: 'Oups...',
                                text: 'There is a problem with adding',
                                type: 'error',
                                speed: 600
                                })
                        this.email = ''
                     })
          this.$router.push("/")  
       }
    }
}
</script>

<style>

     .container-add {
          width: 100%;
          display: flex;
          flex-direction: column;
          align-items: center;
          justify-content: center;
      }

    #title-add {
        font-family: 'Pacifico', cursive;
        color: #2E2D30;
        margin: 0 0 10px 0;
        font-size: 75px;
        padding-top: 25px;
      }

    #title-add-resource {
      font-family: Helvetica, sans-serif;
      font-size: 16px;
      font-weight: 600; 
      color: #2E2D30;
      margin: 0 0 50px 0;
    }
  
   
    .add-form {
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
    }
   
     input, textarea, select#options, .label-file {
        font: 16px/1.6 Helvetica, sans-serif;
        color: #686868;
        padding: 4px 4px 4px 46px;
        width: 100%;
        height: 40px;
        border:solid 1px #FFF;
        border-radius: 5px;
        -moz-appearance: none;
        -webkit-appearance: none;
        box-shadow: none; 
        outline: 0;
        margin-bottom: 20px;
        vertical-align:center;
        background-color:#FFF;
    }

    textarea {
      height: 80px;
    }

    select {
      width: 100%;
    }

    .label-file {
      width: 100%;
    }

    .input-file {
      display:none;
      width: 100%;
    }

    .label-file {
    cursor: pointer;
    }

    .label-file:hover, #options:hover {
        color: #74BDEC;
    }

    #submit {
      margin-bottom: 150px;
    }


    
</style>