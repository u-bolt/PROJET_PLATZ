<template>
  <div id="wrapper-navbar">
    <div class="navbar object">
      <div id="wrapper-bouton-icon">
        <a v-if="$store.state.connectedUser" href="#"><img class="button-add" src="\assets\img\plus.svg" alt="Add resource"></a>
        <a v-if="$store.state.connectedUser && $route.name === 'details'"><img class="button-add" src="\assets\img\edit.svg" alt="Edit resource"></a>
        <a v-if="$store.state.connectedUser && $route.name === 'details'"><img class="button-add" src="\assets\img\remove.svg" alt="Delete resource"></a>
        <div id="bouton-ai">
          <img src="assets/img/icon-ai.svg" alt="illustrator" title="Illustrator" height="28" width="28">
        </div>
        <div id="bouton-psd">
          <img src="assets/img/icon-psd.svg" alt="photoshop" title="Photoshop" height="28" width="28">
        </div>
        <div id="bouton-theme">
          <img src="assets/img/icon-themes.svg" alt="theme" title="Theme" height="28" width="28">
        </div>
        <div id="bouton-font">
          <img src="assets/img/icon-font.svg" alt="font" title="Font" height="28" width="28">
        </div>
        <div id="bouton-photo">
          <img src="assets/img/icon-photo.svg" alt="photo" title="Photo" height="28" width="28">
        </div>
        <div id="bouton-premium">
          <img src="assets/img/icon-premium.svg" alt="premium" title="Premium" height="28" width="28">
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    name: "Nav"
}
</script>

<style>
.button-add {
  float:left;
	width:28px;
	height:28px;
	margin-top:16px;
	margin-right:15px;
	cursor:pointer;
	opacity:1;
	 transition: all 0.2s ease-in-out;
    -webkit-transition: all 0.2s ease-in-out;
    -moz-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    -ms-transition: all 0.2s ease-in-out;
}
</style>