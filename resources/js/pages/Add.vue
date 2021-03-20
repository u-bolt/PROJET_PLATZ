<template>
    <div class="container-add">
        <h2 id="title-add">Platz</h2>
        <h3 id="title-add-resource">Ajouter une ressource</h3>

        <form action="#" @submit.prevent="add" class="add-form">

            <input v-model="formData.name" type="text" placeholder="name" />

            <textarea v-model="formData.description" name="" placeholder="description" cols="30" rows="10"></textarea>
            
            <input type="file" name="image" class="form-control-file" id="image" @change="onFileChange">
            <img v-bind:src="imagePreview" width="100" height="100" v-show="showPreview"/>  

            <select v-model="formData.categorie" id="options">
                <option value="">-- Catégorie --</option>
                <option v-for="categorie in categories" :key="categorie.id" :value="categorie.id">{{ categorie.name }}
                </option>
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
                    image: '',
                    categorie: '',
                    user: ''
                },
                imagePreview: null,
                showPreview: false,
            }
        },
        computed: {
            categories() {
                // Return les ressources correspondants à la resource demandée
                return this.$store.getters.getCategories()
            }
        },
        methods: {
            onFileChange(event){
                this.formData.image = event.target.files[0];
           
                  let reader  = new FileReader();

                  reader.addEventListener("load", function () {
                      this.showPreview = true;
                      this.imagePreview = reader.result;
                  }.bind(this), false);

                  if( this.formData.image ){
                      if ( /\.(jpeg|png|gif)$/i.test( this.formData.image.name ) ) {
                          reader.readAsDataURL( this.formData.image );
                      }
                  }
            },
            add(){
              this.formData.user = this.$store.state.connectedUser.id

              let formData = new FormData();

              formData.append("image", this.formData.image);
              formData.append("name", this.formData.name);
              formData.append("description", this.formData.description);
              formData.append("categorie", this.formData.categorie);
              formData.append("user", this.formData.user);
    
              axios.post('/api/add', formData)
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
                    })
                this.$router.push("/")
            },

        }
    }

</script>

<style scoped>
    img {
        height: 120px;
        width: 160px; 
    }

    .bouton-img {
        padding: 4px 14px 4px 14px;
        width: auto;
        margin: 20px 0px;
        
    }
    .bouton-img:hover {
        background:#6868680a;         
    }

    .champ-image {
      width: 100%;
    }

    .image-affiche {
      padding-bottom: 20px;
    }

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
        width: 30%;
    }

    input,
    textarea,
    button,
    select#options,
    .label-file {
        font: 16px/1.6 Helvetica, sans-serif;
        color: #686868;
        padding: 4px 4px 4px 46px;
        width: 100%;
        height: 40px;
        border: solid 1px #FFF;
        border-radius: 5px;
        -moz-appearance: none;
        -webkit-appearance: none;
        box-shadow: none;
        outline: 0;
        margin-bottom: 20px;
        vertical-align: center;
        background-color: #FFF;
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
        display: none;
        width: 100%;
    }

    .label-file {
        cursor: pointer;
    }

    .label-file:hover,
    #options:hover {
        color: #74BDEC;
    }

    #submit {
        margin-bottom: 150px;
    }

</style>
