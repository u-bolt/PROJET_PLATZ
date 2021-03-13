<template>
  <div class="container-login">
      <h2 id="title-login">Platz</h2>
      <form action="#" @submit.prevent="login" class="login-form">
          <input type="text" v-model="formData.email" placeholder="Login"/>
          <input type="password" v-model="formData.password" placeholder="Password"/>
          <button id="submit" :class="!formData.email.length || !formData.password.length?'disabled':''">Submit</button>
      </form>
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
                    this.$store.dispatch('loginUser', response.data)
                    this.$router.push({name: "homepage"})
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
</style>