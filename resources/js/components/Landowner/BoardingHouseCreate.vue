<template>
    <div>
        <div class="section">
            <div class="columns">
                <div class="column is-8 is-offset-2">

                    <form @submit.prevent="submit">
                        
                        <div class="panel is-primary">
                            <div class="panel-heading">
                                NEW BOARDING HOUSE
                            </div>
                            <div class="panel-body">

                                <b-field label="BHOUSE NAME">
                                    <b-input type="text" v-model="fields.bhouse_name" placeholder="Bhouse Name" />
                                </b-field>

                                <b-field label="OWNER">
                                    <b-input type="text" v-model="fields.owner" placeholder="Bhouse Owner" />
                                </b-field>

                                <b-field label="ATTACH BUSINESS PERMIT"
                                        :type="this.errors.business_permit_imgpath ? 'is-danger':''"
                                         :message="this.errors.business_permit_imgpath ? this.errors.business_permit_imgpath[0] : ''">
                                    <b-upload v-model="fields.business_permit_imgpath" class="file-label">
                                        <span class="file-cta">
                                            <b-icon class="file-icon" icon="upload"></b-icon>
                                            <span class="file-label">Click to upload</span>
                                        </span>
                                        <span class="file-name" v-if="fields.business_permit_imgpath">
                                            {{ fields.business_permit_imgpath.name }}
                                        </span>
                                    </b-upload>
                                </b-field>

                                <b-field label="BHOUSE IMAGE">
                                    <b-upload v-model="fields.bhouse_img_path" class="file-label">
                                        <span class="file-cta">
                                            <b-icon class="file-icon" icon="upload"></b-icon>
                                            <span class="file-label">Click to upload</span>
                                        </span>
                                        <span class="file-name" v-if="fields.bhouse_img_path">
                                            {{ fields.bhouse_img_path.name }}
                                        </span>
                                    </b-upload>
                                </b-field>

                                <div class="columns">
                                    <div class="column">
                                        <div id="mapid"></div>
                                    </div>
                                </div>

                                <b-field>
                                    <b-field label="LATITUDE">
                                        <b-input type="text" v-model="fields.lat" placeholder="Latitude"></b-input>
                                    </b-field>
                                    <b-field label="LONGITUDE">
                                        <b-input type="text" v-model="fields.long" placeholder="Latitude"></b-input>
                                    </b-field>
                                </b-field>

                            </div><!--panelbody-->

                            <div class="panel-footer">
                                <div class="buttons is-right">
                                    <button class="button is-primary">SAVE</button>
                                </div>
                            </div>
                        </div>

                    </form><!--form-->

                </div> <!--column -->
            </div><!--cols-->
        </div><!--section-->
    </div>
</template>
<script>

export default {

    data(){
        return{
            fields: {
                bhouse_name: '',
                owner: '',
                business_permit_imgpath: null,
                bhouse_img_path: null,
                lat: 0,
                long: 0
            },
            errors: {},

           
        }
    },

    methods: {

        loadMap(){
            //init map
            var mymap = L.map('mapid').setView([8.062958238977133,123.75316500663757], 17);
            
            //to call data inside nested function
            var vm = this.fields;

            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZXRpZW5uZXdheW5lIiwiYSI6ImNrcno0N29seTE2bG0yd2szOXl5OXZ0ZWsifQ.xlNi77GcJmddd9UZTz1Hpw', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 18,
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1,
                accessToken: 'pk.eyJ1IjoiZXRpZW5uZXdheW5lIiwiYSI6ImNrcno0N29seTE2bG0yd2szOXl5OXZ0ZWsifQ.xlNi77GcJmddd9UZTz1Hpw'
            }).addTo(mymap);

            var theMarker = {};

            mymap.on('click', function(e) {
              
                //this.fields.lat = e.latlng.lat;
                //this.fields.long = e.latlng.lng;
                let lat = e.latlng.lat;
                let long = e.latlng.lng;

                if(theMarker != undefined){
                    mymap.removeLayer(theMarker);
                }

                theMarker = L.marker([lat,long]).addTo(mymap);  

                //assign data to vm
                vm.lat = lat;
                vm.long = long;
            });
        },

        submit: function(){
            
            var formData = new FormData();

            formData.append('bhouse_name', this.fields.bhouse_name);
            formData.append('owner', this.fields.owner);
            formData.append('business_permit_imgpath', this.fields.business_permit_imgpath);
            formData.append('bhouse_img_path', this.fields.bhouse_img_path);
            formData.append('lat', this.fields.lat);
            formData.append('long', this.fields.long);
           
            axios.post('/boarding-house', formData).then(res=>{
                if(res.data.status === 'saved'){
                    this.$buefy.dialog.alert({
                        title: 'SAVED!',
                        message: 'Boarding house successfully saved. Please wait for the approval of your boarding house.',
                        type: 'is-success',
                        onConfirm: ()=> {
                            window.location = '/boarding-house'
                        }
                    })
                }
            }).catch(err=>{
                if(err.response.status === 422){
                    this.errors = err.response.data.errors;
                }
            });

        },


        
    },

    mounted(){
        this.loadMap();
    }


}
        

</script>


<style scoped>
    #mapid { height: 500px; }
</style>
