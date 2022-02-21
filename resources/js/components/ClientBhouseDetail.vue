<template>
    <div>

        <div class="columns">
            <div class="column is-8 is-offset-2">

                <div class="section">
                    <div class="">
                        <div class="columns">
                            <div class="column">
                                <div class="bhouse-image">
                                    <img :src="`/storage/bhouses/${data.bhouse_img_path}`" />
                                </div>
                            </div>
                            <div class="column">
                                <div class="bhouse-right">
                                    <div class="bhouse-title">
                                        {{data.bhouse_name}}
                                    </div>
                                    <div class="bhouse-desc">
                                        DESCRIPTION: {{ data.bhouse_desc }}
                                    </div>
                                    <div>
                                        Landowner {{ data.lname }}, {{ data.fname }} {{ data.mname }}
                                    </div>
                                    <div>
                                        Contact No. {{ data.contact_no }}
                                    </div>
                                    <div>
                                        STREET/PUROK: {{ data.street }}
                                    </div>

                                    <div class="buttons mt-5">
                                        <b-button type="is-link" tag="a" :href="`/client-bh-rooms/${bhouse_id}`">SEE MORE...</b-button>
                                    </div>
                                </div>
                            </div>
                        </div><!--cols-->

                        <div class="columns">
                            <div class="column">
                                <h1 class="title is-4">RULES</h1>
                                <p>{{ data.bhouse_rule }} </p>
                            </div>
                        </div>

                    </div>
                </div><!-- section -->

                <div id="mapid"></div>


            </div>
        </div>

    </div>
</template>


<script>


export default {

    props: {
        propData:{
            type: String,
            default: '',
        },
        propBhouseId : {
            type: String,
            default: '',
        }
    },
    data() {
        return{
            data: [],
            //position: {},

            nlat: 0,
            nlong: 0,

            bhouse_id: 0,
        }

    },

    methods: {

        loadNavigator(){
            if(navigator.geolocation){
                navigator.permissions.query({ name: 'geolocation' }).then(permission=>{
                    // if(permission.state === 'denied'){
                    //     alert('Please allow us to record your location.');
                    //     return;
                    // }
                    navigator.geolocation.getCurrentPosition(this.getPosition);
                })

            }else{
                //this.camera = 'off';
                alert('Geolocation is not supported by this browser but still you can continue using the scanner.');
            }
        },

        getPosition(position) {
            //console.log(position.coords.latitude, position.coords.longitude);
            //this.position.lat = position.coords.latitude;
            //this.position.long = position.coords.longitude;
            this.nlat = position.coords.latitude;
            this.nlong = position.coords.longitude;

            this.loadMap();
        },

        loadMap(){
            //init map


            var mymap = L.map('mapid').setView([this.data.lat, this.data.long], 17);
            //to call data inside nested function

            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZXRpZW5uZXdheW5lIiwiYSI6ImNrcno0N29seTE2bG0yd2szOXl5OXZ0ZWsifQ.xlNi77GcJmddd9UZTz1Hpw', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 18,
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1,
                accessToken: 'pk.eyJ1IjoiZXRpZW5uZXdheW5lIiwiYSI6ImNrcno0N29seTE2bG0yd2szOXl5OXZ0ZWsifQ.xlNi77GcJmddd9UZTz1Hpw'
            }).addTo(mymap);

            //add route in leaflet

            L.Routing.control({
                waypoints: [
                    L.latLng(this.nlat, this.nlong),//bhouse coordiantes
                    L.latLng(this.data.lat, this.data.long)//current location coordinates
                ]
            }).addTo(mymap);


            var popup = L.popup()
                .setLatLng(this.nlat, this.nlong)
                .setContent('<p>Hello world!<br />This is a nice popup.</p>')
                .openOn(map);
                

        }, //load map

        loadData(){
            axios.get('/get-bhouse-detail/' + this.bhouse_id).then(res=>{
                this.data = res.data;
            });
        },


        initData: function(){
            //this.data = JSON.parse(this.propData);
            this.bhouse_id = parseInt(this.propBhouseId);
            this.loadData();
        }


    },

    mounted() {
       this.initData();
       this.loadNavigator();

        //this.loadMap();

    }
}
</script>

<style scoped>


    .bhouse-title{
        font-size: 1.5em;
        font-weight: bold;
    }
    .bhouse-desc{
        font-size: 1em;
        margin-top: 5px;
    }
    .bhouse-loc{
        margin-top: 15px;
    }

    #mapid { height: 500px; z-index: 0;}

</style>
