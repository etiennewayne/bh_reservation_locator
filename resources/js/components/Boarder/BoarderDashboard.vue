<template>
    <div>

        <div class="section">
            <div class="columns is-centered">
                <div class="column is-4">
                    <h1 class="title is-4"><b>WELCOME: {{ user.fname }} {{user.lname}}</b></h1>
                </div>
            </div>
        </div>
    </div>
</template>


<script>

export default{
    data(){
        return{
            user: {},
        }
    },
    methods: {
        loadUser(){
            axios.get('/get-bhouse-user').then(res=>{
                this.user = res.data;
            })
        }
    },

    mounted() {
        this.loadUser();
    }
}
</script>
