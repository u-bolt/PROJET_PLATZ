<template>
  <div>
        <div id="wrapper-thank">
    <div class="thank">
        <div class="thank-text">pl<span style="letter-spacing:-5px;">a</span>tz</div>
    </div>
    </div>

    <div id="main-container-footer">
    <div class="container-footer">

        <div id="row-1f">
        <div class="text-row-1f">
            <span style="font-weight:600;font-size:15px;color:#666;line-height:250%;text-transform:uppercase;letter-spacing:1.5px;">
            What is Platz
            </span>
            <br>
            Platz is a blog showcasing hand-picked free themes, design stuff, free fonts andother resources for web designers.
        </div>
        </div>

        <div id="row-2f">
        <div class="text-row-2f">
            <span style="font-weight:600;font-size:15px;color:#666;line-height:250%;text-transform:uppercase;letter-spacing:1.5px;">
            How does it work
            </span>
            <br> 
            Platz offers you all the latest freebies found all over the fourth corners
            without to pay.
        </div>
        </div>

        <div id="row-3f">
        <div class="text-row-3f">
            <span style="font-weight:600;font-size:15px;color:#666;line-height:250%;text-transform:uppercase;letter-spacing:1.5px;">
            Get in touch!
            </span>
            <br>
            Subscribe our RSS or follow us on Facebook, Google+, Pinterest or Dribbble to
            keep updated.
        </div>
        </div>

        <div id="row-4f">
        <div class="text-row-4f">
            <span style="font-weight:600;font-size:15px;color:#666;line-height:250%;text-transform:uppercase;letter-spacing:1.5px;">
            Newsletter
            </span>
            <br>
            You will be informed monthly about the latest content avalaible.
        </div>
        <div id="main_tip_newsletter">
            <form @submit.prevent="add" method="POST">
            <input v-model="email" type="text" name="newsletter" id="tip_newsletter_input" list="newsletter" autocomplete=off required>
            </form>
            <notifications position="bottom right" />
        </div>
        </div>

    </div>
    </div>

    <div id="wrapper-copyright">
    <div class="copyright">
        <div class="copy-text object">Copyright © 2016. Template by 
        <a style="color:#D0D1D4;" href="https://dcrazed.com/">Dcrazed</a>
        </div>
        <div class="wrapper-navbouton">
        <div class="google object">g</div>
        <div class="facebook object">f</div>
        <div class="linkin object">i</div>
        <div class="dribbble object">d</div>
        </div>
    </div>
    </div>
  </div>
</template>

<script>
export default {
    name: "Footer",
    data() {
        return {
            email: ''
        }
    },
    methods: {
        add() {
            // Check la validité de l'email via un regex
            if( /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(this.email)) {
                axios.post('api/newsletters/', {email: this.email})
                     .then(response => {
                         // Notification si ok
                        this.$notify({
                            title: 'Thank you !',
                            text: 'Thank you for your subscription',
                            type: 'success',
                            speed: 600
                            })
                        this.email = ''
                    
                     })
                     .catch(() => {
                         // Notification si problème durant la transaction
                        this.$notify({
                                title: 'Oups...',
                                text: 'There is a problem with your subscribtion',
                                type: 'error',
                                speed: 600
                                })
                        this.email = ''
                     })
            }
            else {
                // Notification si email n'est pas valide
                this.$notify({
                        title: 'Oups...',
                        text: 'Your email address is not valid',
                        type: 'warn',
                        speed: 600
                        })
            }
        }
    }
}
</script>