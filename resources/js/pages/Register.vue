<template>
  <div class="container-login">
      <h2 id="title-register"><router-link to="/">Platz</router-link></h2>
      <h3>Register</h3>
      <form action="#" @submit.prevent="login" class="register-form">
          <input type="text" v-model="formData.firstname" placeholder="Firstname"/>
          <input type="text" v-model="formData.lastname" placeholder="Lastname"/>
          <input type="text" v-model="formData.pseudo" placeholder="Pseudo"/>
          <input type="text" v-model="formData.email" placeholder="Email"/>
          <input type="password" v-model="formData.password" placeholder="Password"/>
          <div class="button-container">
            <button class="submit-form" :class="!formData.email.length || !formData.password.length?'disabled':''">Register</button>
            <button class="already-login"><router-link to="/login">Already login? Sign in</router-link></button>
          </div>
      </form>
  </div>
</template>

<script>
export default {
    name: 'Register',
    data() {
        return {
            formData: {
                fistname: '',
                lastname: '',
                pseudo: '',
                email: '',
                password: ''
            }
        }
    },
    methods: {
        login() {
            if( /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(this.formData.email)) {
                axios.get('/sanctum/csrf-cookie').then(response => {
                    axios.post('/api/register', this.formData).then(response => {
                        if (response.data.status_code === 200) {
                            this.$store.dispatch('loginUser', response.data.user)
                            let temp = JSON.stringify(response.data.user)
                            sessionStorage.setItem('user', temp)
                            this.$router.push({name: "homepage"})
                        }
                    })
                });
            }
        }
    }
}
</script>

<style>
    .container-login {
        width: 100%;
        height: 100vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .register-form {
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
    }

    input {
        font: 16px/1.6 Helvetica, sans-serif;
        color: #686868;
        padding: 4px 4px 4px 46px;
        width: 250px;
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

    .button-container {
        display: flex;
    }

    .submit-form {
        font-family: Helvetica, sans-serif;
        font-size: 16px;
        font-weight: 600;
        color: #FFF;
        cursor: pointer;
        width: 150px;
        height: 40px;
        padding: 5px 10px;
        border-radius: 4px;
        background-color: #74BDEC;
        border: none;
    }

    .submit-form:hover {
        background-color: #5dafe6;
    }

    .already-login {
        font-family: Helvetica, sans-serif;
        font-size: 16px;
        font-weight: 600;
        color: #74BDEC;
        cursor: pointer;
        width: 150px;
        height: 40px;
        padding: 5px 10px;
        background: none;
        border-radius: 4px;
        border: none;
    }

    .already-login a {
        font-family: Helvetica, sans-serif;
        font-size: 16px;
        font-weight: 600;
        color: #74BDEC;
    }

    .already a:hover {
        color: #5dafe6;
    }

    
    #title-register {
        font-family: 'Pacifico', cursive;
        color: #2E2D30;
        margin: 0 0 50px 0;
        font-size: 100px
    }

    #title-register a {
        color: #2E2D30;
    }
</style>