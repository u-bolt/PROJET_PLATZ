<template>
    <div>
      <Header />
      <Nav :resourceId="resourceId" />
      <FilterMenu :resourceId="resourceId"/>
        <!-- PORTFOLIO -->
        <div id="wrapper-container">
            <div class="container object">
              
                <div id="main-container-image ">

                    <div class="title-item">
                        <div>
                            <img :src="`assets/img/${categorie(resource).icon}`" style="float: left; width: 68px; height: 68px; margin-right:20px" alt="icon" />
                        </div>
                        <div class="title-text"> {{resource.name}} </div>
                        <div class="title-text-2">{{ formatDate(resource.created_at) }} by {{ user(resource).pseudo }}</div>
                    </div>

                    <div class="work">
                        <figure class="white">
                            <img :src="`assets/img/${resource.image}`" alt="" />
                        </figure>


                        <div class="wrapper-text-description">

                            <div class="wrapper-file">
                                <div class="icon-file"><img :src="`assets/img/${categorie(resource).icon}`" alt="" width="21" height="21" /></div>
                                <div class="text-file">{{ categorie(resource).name }}</div>
                            </div>

                            <div class="wrapper-weight">
                                <div class="icon-weight"><img src="assets/img/icon-weight.svg" alt="" width="20"  height="23" /> </div>
                                <div class="text-weight"> {{resource.weight}}</div>
                            </div>

                            <div class="wrapper-desc">
                                <div class="icon-desc"><img src="assets/img/icon-desc.svg" alt="" width="24" height="24" />  </div>
                                <div class="text-desc"> {{resource.description}} </div>
                            </div>

                            <div class="wrapper-download">
                                <div class="icon-download"><img src="assets/img/icon-download.svg" alt="" width="19" height="26" /></div>
                                <div class="text-download"><a href="#"><b>Download</b></a></div>
                            </div>

                            <div class="wrapper-morefrom">
                                <div class="text-morefrom">More from {{ categorie(resource).name }}</div>
                                <div class="image-morefrom">
                                   <router-link :key="index" v-for="(resource, index) in moreResources" :to="`/details/${resource.id}`">
                                       <div :class="`image-morefrom-${index + 1}`"><img :src="`assets/img/${resource.image}`" alt="" width="430" height="330" /></div>
                                   </router-link>
                                </div>
                            </div>

                        </div>


                        <div class="post-reply">
                            <div id="title-post-send">
                                <hr />
                                <h2>Your comments</h2>
                            </div>
                        </div>

                        <div :key="index" v-for="(comment, index) in comments(resource) " class="post-reply">
                            <div class="image-reply-post"></div>
                            <div class="name-reply-post">{{ userComment(comment).firstname }} {{ userComment(comment).lastname }} </div>
                            <div class="text-reply-post">{{ comment.content }}</div>
                        </div>


                        <div class="post-send">
                            <div id="main-post-send">
                                <div id="title-post-send">  Add your comment</div>
                                <form id="contact" method="post" action="/onclickprod/formsubmit_op.asp">
                                    <fieldset>
                                        <p>
                                            <textarea id="message" name="message" maxlength="500" placeholder="Votre Message" tabindex="5" cols="30" rows="4"></textarea>
                                        </p>
                                    </fieldset>
                                    <div style="text-align:center;"><input type="submit" name="envoi" value="Envoyer" />
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <Footer />
        </div>

    </div>
</template>

<script>
    import Header from '../components/Header.vue'
    import FilterMenu from '../components/FilterMenu'
    import Nav from '../components/Nav'
    import Footer from '../components/Footer'
    import moment from 'moment'

    export default {
        components: {
            Header,
            FilterMenu,
            Nav,
            Footer
        },
        data() {
            return {
                params: {
                    start: 0,
                    end: 4,
                    categorie: null
                },
                resourceId: null
            }
        }, 
        methods: {
            formatDate(value){
                if (value) {
                    return moment(String(value)).format("MMM DD, YYYY ")
                }
            }
        },
        computed: {
            resource() {
                let id = this.$route.params.id
                this.resourceId = id
                return this.$store.getters.getResourceById(id)
            },
            categorie() {
                return function(resource) {
                    // Return les ressources correspondants à la resource demandée
                    return this.$store.getters.getCategoriesByResourcesId(resource)
               }
            },
            user() {
                return function(resource){
                     // Return le user correspondants à la resource demandée
                    return this.$store.getters.getUsersByResourcesId(resource)
                }
            },
            comments() {
                return function(resource) {
                     // Return les comments correspondants à la resource demandée
                     return  this.$store.getters.getCommentsByResourcesId(resource)
                }
            },
            userComment() {
                return  this.$store.getters.getUsersByCommentId
            },
            moreResources() {
                this.params.categorie = this.resource.categorie_id
                return  this.$store.getters.getResourcesByCategoriesId(this.params)
            }

        }

    }

</script>

<style scoped>


/*----------------------------*/
/* MAIN DIV WITH IMAGE */
/*----------------------------*/
#main-container-image {
    float: left;
    width: 100%;
    height: auto;
    background-color: #F4F4F4;
    margin-top: 25px;
    opacity: 0;
}
.work figure-single {
    float: left;
    width: 60%;
    margin-left: 7.5%;
    height: auto;
    padding: 0 !important;
    transition: all 0.3s ease-in-out;
    -webkit-transition: all 0.3s ease-in-out;
    -moz-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    -ms-transition: all 0.3s ease-in-out;
    -webkit-box-shadow: 1px 1px 2px 0px rgba(0, 0, 0, 0.2);
    -moz-box-shadow: 1px 1px 2px 0px rgba(0, 0, 0, 0.2);
    box-shadow: 1px 1px 2px 0px rgba(0, 0, 0, 0.2);
    background-color: #FFF;
}
.work figure-single img {
    height: 95%;
    width: 95%;
    margin-left: 2.5%;
    margin-top: 2.5%;
}

.white {
    float: left;
    width: 52.5%;
}
.white img {
    width: 100%;
}
.part-info-image-single {
    float: left;
    margin-bottom: 17.5px;
}
#wrapper-part-info .part-info-image img {
    height: 20%;
    width: 20%;
}
.wrapper-text-description {
    position: absolute;
    width: 35%;
    right: 5.5%;
    height: auto;
    margin-top: 85px;
}
.wrapper-view,
.wrapper-file,
.wrapper-weight,
.wrapper-desc,
.wrapper-download {
    float: left;
    width: 100%;
    border-bottom: solid #E0E0E0 1px;
}
.wrapper-file,
.wrapper-weight,
.wrapper-desc,
.wrapper-download {
    border-top: solid #FFF 1px;
}
.wrapper-morefrom {
    float: left;
    width: 100%;
    border-top: solid #FFF 1px;
}
.wrapper-view,
.wrapper-file,
.wrapper-weigh,
.wrapper-download,
.wrapper-morefrom {
    height: 40px;
}
.wrapper-desc,
.wrapper-morefrom {
    height: auto;
}
.icon-view,
.icon-file,
.icon-weight,
.icon-desc,
.icon-download {
    float: left;
    left: 0;
    margin-right: 25px;
}
.icon-view {
    margin-top: 10px;
}
.icon-file {
    margin-top: 9px;
    margin-left: 2px;
}
.icon-weight {
    margin-top: 8px;
    margin-left: 2px;
}
.icon-desc {
    margin-top: 7px;
}
.icon-download {
    margin-top: 6px;
    margin-left: 3px;
}
.icon-view img,
.icon-file img,
.icon-weight img,
.icon-desc img,
.icon-download img {
    height: 100%;
    width: 100%;
}
.text-view,
.text-file,
.text-weight,
.text-desc,
.text-download {
    float: left;
    text-align: left;
    font-family: Helvetica, sans-serif;
    font-size: 15px;
    font-weight: 400;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    color: #A1A1A1;
}
.text-view,
.text-file,
.text-weight,
.text-download {
    height: 40px;
    line-height: 40px;
}
.text-desc {
    width: calc(100% - 49px);
    line-height: 130%;
    height: auto;
    margin-bottom: 25px;
    margin-top: 10px;
}
.text-download a {
    color: #A1A1A1;
    transition: all 0.2s ease-in-out;
    -webkit-transition: all 0.2s ease-in-out;
    -moz-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
}
.text-download a:hover {
    color: #666;
}
.text-morefrom {
    float: left;
    text-align: left;
    font-family: Helvetica, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    font-size: 16px;
    font-weight: 600;
    color: #686868;
    width: 100%;
    margin-left: 0;
    line-height: 130%;
    height: auto;
    margin-bottom: 0;
    margin-top: 20px;
}
.image-morefrom {
    float: left;
    width: 100%;
    margin-top: 20px;
    height: auto;
    margin-bottom: 35px;
}
.image-morefrom-1,
.image-morefrom-2,
.image-morefrom-3,
.image-morefrom-4 {
    float: left;
    width: 47.5%;
    height: auto;
    -webkit-box-shadow: 1px 1px 2px 0px rgba(0, 0, 0, 0.2);
    -moz-box-shadow: 1px 1px 2px 0px rgba(0, 0, 0, 0.2);
    box-shadow: 1px 1px 2px 0px rgba(0, 0, 0, 0.2);
    background-color: #FFF;
    transition: all 0.2s ease-in-out;
    -webkit-transition: all 0.2s ease-in-out;
    -moz-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    cursor: pointer;
}
.image-morefrom-1,
.image-morefrom-3 {
    margin-right: 5%;
}
.image-morefrom-1,
.image-morefrom-2 {
    margin-bottom: 12.5px;
}
.image-morefrom-1 img,
.image-morefrom-2 img,
.image-morefrom-3 img,
.image-morefrom-4 img {
    width: 85%;
    height: auto;
    margin-left: 7.5%;
    padding-bottom: 7.5%;
    padding-top: 7.5%;
}
.image-morefrom-1:hover,
.image-morefrom-2:hover,
.image-morefrom-3:hover,
.image-morefrom-4:hover {
    opacity: 0.5;
}
.post-reply,
.post-reply-2 {
    float: left;
    width: 53%;
    margin-left: 4%;
    height: auto;
}
.post-reply {
    margin-top: 50px;
}
.image-reply-post,
.image-reply-post-2 {
    float: left;
    width: 65px;
    height: 65px;
    background: url(../../../public/assets/img/avatar.png) no-repeat;
    top: 0;
}
.image-reply-post {
    background: url(../../../public/assets/img/avatar.png) no-repeat;
}
.image-reply-post-2 {
    background: url(../../../public/assets/img/avatar-2.png) no-repeat;
}
.name-reply-post,
.name-reply-post-2 {
    float: left;
    width: calc(100% - 95px);
    font-family: Helvetica, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    font-size: 16px;
    font-weight: 600;
    color: #686868;
    line-height: 65px;
    height: 65px;
    padding-left: 30px;
}
.text-reply-post,
.text-reply-post-2 {
    float: left;
    text-align: left;
    height: auto;
    line-height: 140%;
    margin-left: 95px;
    width: calc(90% - 95px);
    font-family: Helvetica, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    font-size: 16px;
    font-weight: 400;
    color: #999;
    margin-top: -10px;
    border-bottom: solid #E9E9E9 1px;
    padding: 20px;
    margin-top: -20px;
}
.post-send {
    float: left;
    width: 60%;
    margin-left: 7.5%;
    height: auto;
    margin-bottom: 25px;
}
#main-post-send {
    float: left;
    width: calc(90% - 160px);
    margin-left: 95px;
    height: auto;
    margin-top: 0px;
}
#title-post-send {
    font-family: Helvetica, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    font-size: 16px;
    font-weight: 600;
    color: #686868;
    line-height: 65px;
    height: 65px;
    position: relative;
}
textarea {
    font-family: Helvetica, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    font-size: 16px;
    font-weight: 400;
    color: #999;
    width: 320px;
    height: 150px;
    background: #FFF;
    outline: none;
    border: solid 1px #DDDDDD;
    border-radius: 4px;
    padding-left: 10px;
    padding-top: 10px;
    float: left;
    margin-left: -15px;
    margin-top: -25px;
}
input[type=submit] {
    font-family: Helvetica, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    font-size: 16px;
    font-weight: 600;
    color: #FFF;
    cursor: pointer;
    width: 150px;
    height: 40px;
    padding: 5px 10px;
    border-radius: 4px;
    transition: all 0.5s ease-in-out;
    -webkit-transition: all 0.5s ease-in-out;
    /** Chrome & Safari **/
    -moz-transition: all 0.5s ease-in-out;
    /** Firefox **/
    -o-transition: all 0.5s ease-in-out;
    /** Opera **/
    background-color: #74BDEC;
    float: left;
    border: none;
}
fieldset {
    border: none;
}
textarea {
    resize: vertical;
    max-height: 100px;
    min-height: 100px;
}
textarea {
    color: #999;
}
textarea:-moz-placeholder {
    color: #999;
}
textarea::-webkit-input-placeholder {
    color: #999;
}
textarea.placeholder {
    color: #999;
}
.title-item {
    float: left;
    width: 92.5%;
    margin-left: 7.5%;
    margin-top: 15px;
    height: 68px;
    margin-bottom: 10px;
}
.title-icon {
    float: left;
    width: 68px;
    height: 68px;
    margin-right: 20px;
}
.title-text {
    font-family: Helvetica, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    font-size: 22px;
    font-weight: 600;
    color: #686868;
    line-height: 125%;
    height: auto;
    width: calc(100% - 88px);
    margin-top: 8px;
}
.title-text-2 {
    font-family: Helvetica, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    font-size: 15px;
    font-weight: 400;
    color: #A1A1A1;
    line-height: 125%;
    height: auto;
    width: calc(100% - 88px);
    margin-top: 8px;
}

/*----------------------------*/
/* RWD */
/*----------------------------*/

/* Smaller viewports — more tablets, old monitors */
@media only screen and (max-width: 860px) {
    /* #main-header,
    .navbar,
    .container,
    .container-footer,
    .thank,
    .oldnew,
    .copyright {
        width: 715px;
        margin-left: -357.5px;
    }
    #main-container-menu {
        display: none;
    } */
    .part-info-image-single {
        margin-bottom: 11px;
    }
}
/* Even smaller viewports — more tablets, etc. */
@media only screen and (max-width: 740px) {
    
    /* #wrapper-bouton-icon,
    #main_tip_search, */
    #text-search {
        display: none;
    }
   
    .work figure {
        /* width: calc(100% - 30px); */
        margin-left: 15px;
    }
    .wrapper-text-description {
        width: calc(100% - 30px);
        float: left;
        position: relative;
        right: 0;
        margin-left: 15px;
        margin-top: 25px;
    }
    .image-morefrom-1 img,
    .image-morefrom-2 img,
    .image-morefrom-3 img,
    .image-morefrom-4 img {
        width: 90%;
        height: auto;
        margin-left: 5%;
        padding-bottom: 5%;
        padding-top: 5%;
    }
    .post-send,
    .post-reply,
    .post-reply-2 {
        width: calc(100% - 30px);
        margin-left: 15px;
    }
}
/* Mobile phones (Landscape) and Tablets (Portrait) */
@media only screen and (max-width: 610px) {
   
    
    .part-info-image-single {
        float: left;
        margin-bottom: 17px;
    }
    #wrapper-part-info .part-info-image img {
        height: 92%;
        width: 92%;
        margin-left: 4%;
    }
    .work figure img {
        height: 92%;
        width: 92%;
        margin-left: 4%;
        margin-top: 4%;
    }
}
/* Mobile phones (Landscape) and Tablets (Portrait) */
@media only screen and (max-width: 480px) {
    
   
    
    
    .title-item {
        width: calc(100% - 30px);
        margin-left: 15px;
    }
    .title-icon {
        margin-right: 10px;
    }
    .title-text {
        font-size: 22px;
        width: 100%;
        margin-top: 8px;
    }
    .part-info-image-single {
        float: left;
        margin-bottom: 15px;
    }
    #wrapper-part-info .part-info-image img {
        height: 90%;
        width: 90%;
        margin-left: 5%;
    }
    .work figure img {
        height: 90%;
        width: 90%;
        margin-left: 5%;
        margin-top: 5%;
    }
    .name-reply-post,
    .name-reply-post-2 {
        width: calc(100% - 75px);
        padding-left: 10px;
    }
    .text-reply-post,
    .text-reply-post-2 {
        margin-left: 15px;
        width: calc(100% - 30px);
        padding-top: 0;
        padding-left: 0;
        padding-right: 0;
        padding-bottom: 25px;
        margin-top: 20px;
    }
    .post-reply-2 {
        margin-top: 25px;
    }
    #main-post-send {
        width: calc(100% - 30px);
        margin-left: 15px;
    }
    textarea {
        width: calc(100% + 15px);
    }
}

</style>
