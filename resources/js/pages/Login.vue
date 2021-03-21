<template>
  <div class="container-login">
      <h2 id="title-login"><router-link to="/">Platz</router-link></h2>
      <form action="#" @submit.prevent="login" class="login-form">
          <input type="text" v-model="formData.email" placeholder="Email"/>
          <input type="password" v-model="formData.password" placeholder="Password"/>
          <button id="submit" :class="!formData.email.length || !formData.password.length?'disabled':''">Sign in</button>
      </form>
      <router-link class="not-login" to="/register">Don't have an account yet? Register now</router-link>
  </div>
</template>

<script>
export default {
    name: 'Login',
    data() {
        return {
            formData: {
                email: '',
                password: ''
            }
        }
    },
    methods: {
        login() {
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('/api/login', this.formData).then(response => {
                    if(response.data.status_code == 200) {
                        this.$store.dispatch('loginUser', response.data.user)
                        let temp = JSON.stringify(response.data.user)
                        sessionStorage.setItem('user', temp)
                        this.$router.push({name: "homepage"})
                    }
                    else if(response.data.status_code === 400) {
                        this.$notify({
                            title: 'Oups...',
                            text: 'There is a problem with your email or your password',
                            type: 'error',
                            speed: 600
                        })
                    }
                })
            });
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

    .login-form {
        display: flex;
        flex-wrap: wrap;
    }

    input {
        font: 16px/1.6 Helvetica, sans-serif;
        color: #686868;
        padding: 4px 4px 4px 46px;
        width: 170px;
        border:solid 1px #FFF;
        border-radius: 5px;
        -moz-appearance: none;
        -webkit-appearance: none;
        box-shadow: none; 
        outline: 0;
        margin-right: 20px;
        vertical-align:center;
        background-color:#FFF;
    }

    #submit {
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

    #submit:hover {
        background-color: #5dafe6;
    }
    #title-login {
        font-family: 'Pacifico', cursive;
        color: #2E2D30;
        margin: 0 0 50px 0;
        font-size: 100px
    }

    #title-login a {
        color: #2E2D30;
    }

    .not-login {
        font-family: Helvetica, sans-serif;
        font-size: 16px;
        font-weight: 600;
        color: #74BDEC;
        cursor: pointer;
        border-radius: 4px;
        border: none;
    }

    .not-login:hover {
        color: #5dafe6;
    }
</style>