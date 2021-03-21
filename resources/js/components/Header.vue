<template>
    <div>
        <a name="ancre"></a>
        <!-- CACHE -->
        <div class="cache"></div>
        <div id="wrapper-header">
        <div id="main-header" class="object">
            <router-link class="logo" to="/" exact><img src="assets/img/logo-burst.png" alt="logo platz" height="38" width="90"></router-link>
            <template v-if="$store.state.connectedUser">
                <button class="connection-button" @click="logout">Logout</button>
            </template>
            <template v-else>
                <button class="connection-button"><router-link to="/login">Login</router-link></button>
            </template>
            <template v-if="!$store.state.connectedUser">
                <button class="connection-button"><router-link to="/register">Register</router-link></button>
            </template>
            <div id="main_tip_search">
                <Search />
            </div>
            
        </div>
        </div>
    </div>
</template>

<script>
import Search from './Search'
    export default {
        name: "Header",
        components: {
            Search
        },
        methods: {
            logout() {
                sessionStorage.clear()
                axios.post('/api/logout', {user: this.$store.state.connectedUser})
                    .then(response => {
                        this.$store.dispatch('logoutUser', response.data)
                })
            }
        }
    }
</script>

<style>
.connection-button {
    font-family: Helvetica, sans-serif;
    float: right;
    width:100px;
	margin-top:13px;
	height:auto;
	margin-right:15px;
	display:block;
    font-size: 12px;
    font-weight: 600;
    color: #FFF;
    cursor: pointer;
    padding: 11.3px 5px;
    border-radius: 5px;
    background-color: #202020;
    border: none;
}

.connection-button a {
    display: block;
    color: #FFFFFF;
}

#submit:hover {
    background-color: #5dafe6;
}
</style>
