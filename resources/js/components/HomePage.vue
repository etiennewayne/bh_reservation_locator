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

                <div class="modal-card-body">
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
                </div> <!--modal card body -->
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
