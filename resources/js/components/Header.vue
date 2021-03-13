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
            <div id="main_tip_search">
            <form>
                <input type="text" name="search" id="tip_search_input" list="search" autocomplete=off required>
            </form>
            </div>
            <div id="stripes"></div>
        </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Header",
        methods: {
            logout() {
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
	margin-right:25px;
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
