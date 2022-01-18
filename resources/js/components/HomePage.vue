<template>
    <div>

        <b-navbar class="animate__animated animate__fadeIn">
            <template #brand>
                <b-navbar-item>
                    <img class ="logo"
                         src="/img/logo.png">
                </b-navbar-item>
            </template>

            <template #start>
                <b-navbar-item href="/">
                    Home
                </b-navbar-item>
                <b-navbar-item href="#">
                    About
                </b-navbar-item>
                <b-navbar-item href="#">
                    Contact
                </b-navbar-item>
            </template>

            <template #end>
                <b-navbar-item tag="div">

                    <b-navbar-item href="/sign-up">
                        <strong>Register</strong>
                    </b-navbar-item>
                    <b-navbar-item @click="isModalActive = true">
                        <strong>Sign in</strong>
                    </b-navbar-item>

                </b-navbar-item>
            </template>
        </b-navbar>


        <section class="hero is-primary is-fullheight-with-navbar">
            <!-- Hero content: will be in the middle -->
            <div class="hero-body">
                <div class="">
                    <p class="title animate__animated animate__backInLeft">
                        BHLMS
                    </p>
                    <p class="subtitle animate__animated animate__backInRight">
                        Boarding House Locator and Manangement System
                    </p>
                </div>
            </div>

            <!-- Hero footer: will stick at the bottom -->
            <div class="hero-foot">
<!--                <nav class="tabs is-boxed is-fullwidth">
                    <div class="container">
                        <ul>
                            <li class="is-active"><a>Overview</a></li>
                            <li><a>Modifiers</a></li>
                            <li><a>Grid</a></li>
                            <li><a>Elements</a></li>
                            <li><a>Components</a></li>
                            <li><a>Layout</a></li>
                        </ul>
                    </div>
                </nav>-->
            </div>
        </section>

        <section class="section">
            <boarding-house-list></boarding-house-list>
        </section>


        <section class="section">
            <div class="mission-section">
                <div class="mission-wrapper">
                    <div class="mission-title">
                        <h2>
                            <span>&#8220;</span>
                            MISSION
                            <span>&#8220;</span>
                        </h2>
                    </div>
                    <div>
                        <p style="text-align: justify;">
                            To provide opportunities for continuing education for faculty and staff,
                            providing upgraded facilities for quality and research-based instruction to students towards community engagement and linkages to industry.
                        </p>
                    </div>
                </div>

                <div class="mission-img">
                    <img src="/img/gadtc.png" />
                </div>
            </div> <!-- mission section -->
        </section>

        <section class="section">
            <div class="vision-section">
                <div class="vision-img">
                    <img src="/img/facilities.jpg">
                </div>
                <div class="vision-wrapper">
                    <div class="vision-title">
                        <h2>
                            <span>&#8220;</span>
                            VISION
                            <span>&#8220;</span>
                        </h2>
                    </div>
                    <div>
                        <p>
                            To provide opportunities for continuing education for faculty and staff,
                            providing upgraded facilities for quality and research-based instruction to students towards community engagement and linkages to industry.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div style="background-color: #1d6530; padding: 30px; margin: 20px 0 20px 0; text-align: center;">
                <div class="title" style="color: white;">
                    COVID-19 SAFETY TIPS
                </div>
                <div class="subtitle" style="color: white;">
                    Help prevent the prevent the spread of respiratory disease like COVID-19
                </div>
            </div>
            <div class="columns">
                <div class="column is-10 is-offset-1">

                    <div class="columns">

                        <div class="column">
                            <div class="panel">
                                <div class="panel-body">
                                    <h3 class="title">WEAR FACEMASK</h3>
                                    <p> Everyone must wear mask </p>
                                    <img src="/img/mask.png" />
                                </div>
                            </div>
                        </div>

                        <div class="column">
                            <div class="panel">
                                <div class="panel-body">
                                    <h3 class="title">WASH YOUR HANDS</h3>
                                    <p>Wash your hands frequently with soap and water</p>
                                    <img src="/img/hands.png" />
                                </div>
                            </div>
                        </div>

                        <div class="column">
                            <div class="panel">
                                <div class="panel-body">
                                    <h3>DON'T TOUCH</h3>
                                    <p> Do not touch your eyes with dirty hands</p>
                                    <img src="/img/touch.png">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="columns">
                        <div class="column is-4">
                            <div class="panel">
                                <div class="panel-body">
                                    <h3>COVER A COUGH OR SNEEZE</h3>
                                    <p>use tissue when cough/ sneeze</p>
                                    <img src="/img/tissue.png">
                                </div>
                            </div>
                        </div>

                        <div class="column is-4">
                            <div class="panel">
                                <div class="panel-body">
                                    <h3 class="title">KEEP YOUR DISTANCE</h3>
                                    <p>Avoid close contact with poeple wwho are sick.</p>
                                    <img src="/img/dist.png" >
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>


        <section>
            <div class="footer" style="margin-top: 30px; background-color: #5a9669; color:white;">
                <div class = "columns">
                    <div class="column">
                        <div class="footertwo-logo-wrapper">
                            <img class="footer-logo" src="/img/gadtclogo.png">
                        </div>
                    </div>

                    <div class = "column">
                        <div class="p-5">
                            <div class="footer-component-title">
                               Quick Links
                            </div>
                            <div>
                              Home
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="p-5">
                            <div class="footer-component-title">
                                 Address
                            </div>
                             <div>
                                Juan Luna St.
                                Maloro, Tangub City
                                Misamis Occidental
                                Philippines
                            </div>
                        </div>
                    </div>
                     <div class="column">
                        <div class="p-5">
                            <div class="footer-component-title">
                                 Address
                            </div>
                             <div>
                                Juan Luna St.
                                Maloro, Tangub City
                                Misamis Occidental
                                Philippines
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!--modal-->
        <b-modal v-model="isModalActive" has-modal-card
                 trap-focus width="640" aria-role="dialog" aria-modal>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Login</p>
                    <button type="button" class="delete"
                            @click="isModalActive = false"/>
                </header>

                <section class="modal-card-body">
                    <div>
                        <form @submit.prevent="submit">
                            <b-field label="Username"
                                 label-position="on-border"
                                 :type="errors.username ? 'is-danger' : ''"
                                 :message="errors.username ? errors.username[0] : ''">
                            <b-input type="text" v-model="fields.username" placeholder="Username" expanded auto-focus></b-input>
                            </b-field>

                            <b-field label="Password" label-position="on-border"
                                    :type="errors.password ? 'is-danger' : ''"
                                    :message="errors.password ? errors.password[0] : ''">
                                <b-input type="password" v-model="fields.password" password-reveal placeholder="Password" expanded auto-focus></b-input>
                            </b-field>

                            <footer class="modal-card-foot">
                                <button
                                    class="button is-success"
                                    label="LOGIN"
                                    type="is-success">LOGIN</button>

                                <b-button
                                    label="Close"
                                    @click="isModalActive=false"></b-button>
                            </footer>
                        </form>
                    </div>
                </section>

            </div>
        </b-modal>

    </div> <!--root div-->
</template>

<script>
export default {
    data(){
        return{
            locale: undefined,
            isModalActive: false,
            fields: {},
            errors: {},

            appointment_type: '',

            appointmentTypes: [],
        }
    },

    methods: {
        submit: function(){
            axios.post('/login', this.fields).then(res=>{
                window.location = '/dashboard'
            }).catch(err => {
                if(err.response.status === 422){
                    this.errors = err.response.data.errors;
                }
            });
        },

        loadAppointmentType(){
            axios.get('/get-open-appointment-types')
            .then(res=>{
                this.appointmentTypes = res.data;
            });
        }
    },

    mounted() {

    }
}
</script>

<style scoped>

.logo{
    height: 80px;
}

.modal > modal-background{
    background-color: red;
}

    /*.hero{*/
    /*    background-image: url("/img/bg-hero.jpg");*/
    /*    background-repeat: no-repeat;*/
    /*    background-size: cover;*/
    /*}*/



    /*@media only screen and (max-width: 1024px) {*/
    /*    .vision-section{*/
    /*        flex-direction: column;*/
    /*        align-items: center;*/
    /*    }*/

    /*    .mission-section{*/
    /*        flex-direction: column;*/
    /*        align-items: center;*/
    /*    }*/

    /*}*/


</style>
