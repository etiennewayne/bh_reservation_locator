<template>
    <section class="section">
        <div class="columns">
            <div class="column is-8 is-offset-2">
                <div class="panel is-primary">
                    <div class="panel-heading">
                        REGISTER HERE
                    </div>

                    <div class="panel-body">
                        <div class="columns">
                            <div class="column">
                                <b-field label="Username">
                                    <b-input type="text" icon="account"></b-input>
                                </b-field>
                            </div>
                        </div>

                        <div class="columns">
                            <div class="column">
                                <b-field label="Password">
                                    <b-input type="password" icon="lock" password-reveal></b-input>
                                </b-field>
                            </div>
                            <div class="column">
                                <b-field label="Re-type Password">
                                    <b-input type="password" password-reveal></b-input>
                                </b-field>
                            </div>
                        </div>

                        <div class="columns">
                            <div class="column">
                                <b-field label="Email">
                                    <b-input type="email"></b-input>
                                </b-field>
                            </div>
                            <div class="column">
                                <b-field label="Contact No">
                                    <b-input type="text" placeholder="Contact No" v-model="fields.contact_no"></b-input>
                                </b-field>
                            </div>
                        </div>

                        <div class="columns">
                            <div class="column">
                                <b-field label="Last Name">
                                    <b-input type="text"></b-input>
                                </b-field>
                            </div>
                            <div class="column">
                                <b-field label="First Name">
                                    <b-input type="text"></b-input>
                                </b-field>
                            </div>
                        </div>


                        <div class="columns">
                            <div class="column">
                                <b-field label="Middle Name">
                                    <b-input type="text"></b-input>
                                </b-field>
                            </div>

                            <div class="column">
                                <b-field label="Sex" expanded>
                                    <b-select placeholder="Sex" icon="account" expanded>
                                        <option value="MALE">MALE</option>
                                        <option value="FEMALE">FEMALE</option>
                                    </b-select>
                                </b-field>
                            </div>
                            <div class="column">
                                <b-field label="Role" expanded>
                                    <b-select placeholder="Role" v-model="fields.role" icon="account" expanded>
                                        <option value="BOARDER">BOARDER</option>
                                        <option value="LANDOWNER">LANDOWNER</option>
                                    </b-select>
                                </b-field>
                            </div>
                        </div>

                        <div v-if="fields.role === 'BOARDER'">
                            <div class="columns">
                                <div class="column">
                                     <b-field label="Guardian Name" expanded>
                                        <b-input type="text" v-model="fields.guardian_name" placeholder="Guardian Name"></b-input>
                                    </b-field>
                                </div>
                                <div class="column">
                                    <b-field label="Guardian Contact No" expanded>
                                        <b-input type="text" v-model="fields.guardian_contact_no" placeholder="Guardian Contact No"></b-input>
                                    </b-field>
                                </div>
                            </div>
                        </div>
                         <div v-if="fields.role === 'BOARDER'">
                            <div class="columns">
                                <div class="column">
                                    <b-field label="Guardian Address" expanded>
                                        <b-input type="text" v-model="fields.guardian_address" placeholder="Guardian Address"></b-input>
                                    </b-field>
                                </div>
                            </div>
                         </div>


                        <hr>
                        <div class="columns">
                            <div class="column">
                                <b-field label="Province" expanded>
                                    <b-select expanded></b-select>
                                </b-field>
                            </div>
                            <div class="column">
                                <b-field label="City/Municipality" expanded>
                                    <b-select expanded></b-select>
                                </b-field>
                            </div>
                        </div>

                        <div class="columns">
                            <div class="column">
                                <b-field label="Barangay" expanded>
                                    <b-select expanded></b-select>
                                </b-field>
                            </div>
                            <div class="column">
                                <b-field label="House #. Street">
                                    <b-input type="text"></b-input>
                                </b-field>
                            </div>
                        </div>


                        <div class="buttons is-right">
                            <b-button type="is-primary">Register</b-button>
                        </div>

                    </div> <!--panel -body-->
                </div> <!--panel-->
            </div>
        </div>
    </section>
</template>

<script>

export default {
    data() {
        return{
            fields: {
                role: 'BOARDER',
            },

        }

    },

    methods: {

    }


}
</script>


<style scoped>

    .panel-body{
        /*padding: 25px;*/
    }


/*    dere lang kubia ang panel color*/
</style>
