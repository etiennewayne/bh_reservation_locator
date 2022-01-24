<template>
    <div>
        <div class="section">
            <div class="columns">
                <div class="column is-8 is-offset-2">
                    <div class="panel">
                        <div class="panel-heading">
                            BEDSAPACE
                        </div>

                        <div class="panel-body">
                            <div class="">
                                <div class="buttons">
                                    <button class="button" @click="openModal">NEW BEDSPACE</button>
                                </div>
                            </div>

                            <div class="section">
                                <div class="columns">
                                    <div class="column">
                                        <div v-for="(item, index) in this.bedspaces" :key="index" class="card-container">
                                            <div class="img-container">
                                                <img :src="`/storage/bedspaces/` + item.bedspace_img_path" />
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>




        <!--modal create-->
        <b-modal v-model="isModalCreate" has-modal-card
                 trap-focus
                 :width="640"
                 aria-role="dialog"
                 aria-label="Modal"
                 aria-modal>

            <form @submit.prevent="submit">
                <div class="modal-card">
                    <header class="modal-card-head">
                        <p class="modal-card-title">Bedspaces</p>
                        <button
                            type="button"
                            class="delete"
                            @click="isModalCreate = false"/>
                    </header>

                    <section class="modal-card-body">
                        <div class="">
                            <div class="columns">
                                <div class="column">

                                    <b-field label="Bedspace Name"
                                             :type="this.errors.bedspace_name ? 'is-danger':''"
                                             :message="this.errors.bedspace_name ? this.errors.bedspace_name[0] : ''">
                                        <b-input v-model="fields.bedspace_name" type="text" icon="account"></b-input>
                                    </b-field>

                                    <b-field label="Bedspace Description"
                                            :type="this.errors.bedspace_desc ? 'is-danger':''"
                                            :message="this.errors.bedspace_desc ? this.errors.bedspace_desc[0] : ''">
                                        <b-input v-model="fields.bedspace_desc" type="textarea"></b-input>
                                    </b-field>

                                    <b-field label="Price"
                                            :type="this.errors.price ? 'is-danger':''"
                                            :message="this.errors.price ? this.errors.price[0] : ''">
                                        <b-numberinput v-model="fields.price" step="0.01" controls-alignment="right" controls-position="compact"></b-numberinput>
                                    </b-field>

                                    <b-field mb-auto>
                                        <b-upload v-model="fields.bedspaces"
                                            multiple
                                            drag-drop>
                                            <section class="section">
                                                <div class="content has-text-centered">
                                                    <p>
                                                        <b-icon
                                                            icon="upload"
                                                            size="is-large">
                                                        </b-icon>
                                                    </p>
                                                    <p>Drop your files here or click to upload</p>
                                                </div>
                                            </section>
                                        </b-upload>
                                    </b-field>

                                    <div class="tags">
                                        <span v-for="(file, index) in fields.bedspaces"
                                            :key="index"
                                            class="tag is-primary" >
                                            {{file.name}}
                                            <button class="delete is-small"
                                                type="button"
                                                @click="deleteDropFile(index)">
                                            </button>
                                        </span>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </section>
                    <footer class="modal-card-foot">
                        <b-button
                            label="Close"
                            @click="isModalCreate=false"/>
                        <button
                            :class="btnClass"
                            label="Save"
                            type="is-success">SAVE</button>
                    </footer>
                </div>
            </form><!--close form-->
        </b-modal>
        <!--close modal-->


    </div>
</template>

<script>
export default {
    props: {
        propDataId: {
            type: String,
            default: '',
        }
    },
    data(){
        return{

            isModalCreate: false,

            fields: {
                bedspaces: {},
            },

            bedspaces: [],

            errors: {},

            btnClass: {
                'is-success': true,
                'button': true,
                'is-loading':false,
            },

        }
    },

    methods: {

        loadBedspaces: function(){
            axios.get('/get-boarding-house-bedspaces/' + parseInt(this.propDataId)).then(res=>{
                this.bedspaces = res.data;
                console.log(this.bedspaces);
            });
        },

        openModal(){
            this.isModalCreate=true;
            this.fields = {};
            this.errors = {};
        },
        deleteDropFile(index) {
            this.fields.bedspaces.splice(index, 1)
        },


        submit: function(){

            var formData = new FormData();

            formData.append('bedspace_name', this.fields.bedspace_name);
            formData.append('bedspace_desc', this.fields.bedspace_desc);

            this.fields.bedspaces.forEach(item =>{
                formData.append('bedspace_img_path[]', item);
            });
            formData.append('price', this.fields.price);

            axios.post('/boarding-house-bedspace/' + parseInt(this.propDataId), formData).then(res=>{
                if(res.data.status === 'saved'){
                    this.isModalCreate =- false;
                    this.$buefy.dialog.alert({
                        title: 'Success!',
                        message: 'Bedspace(s) successfully saved.',
                        type: 'is-success',
                    });
                }
            });
        }

    },

    mounted(){
        this.loadBedspaces();
    }
}
</script>

<style scoped>

.card-container{
    display: flex;
    flex-direction: row;
}
.img-container{
    padding: 15px;
    border: 1px solid black;
    margin: 15px;
    width: 150px;
}
.img-container > img{
    width: 150px;
}
</style>
