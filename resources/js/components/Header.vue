<template>
    <div>
        <a name="ancre"></a>
        <!-- CACHE -->
        <div class="cache"></div>
        <div id="wrapper-header">
        <div id="main-header" class="object">
            <router-link class="logo" to="/" exact><img src="assets/img/logo-burst.png" alt="logo platz" height="38" width="90"></router-link>
            <div id="main_tip_search">
            <form>
                <input type="text" name="search" id="tip_search_input" list="search" autocomplete=off required>
            </form>
            </div>
            
        </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Header"
    }
</script>
