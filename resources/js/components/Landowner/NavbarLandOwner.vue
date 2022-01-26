<template>
    <div>
        <div class="mynav">
            <div class="burger-button" @click="open = true">
                <div class="burger-div"></div>
                <div class="burger-div"></div>
                <div class="burger-div"></div>
            </div>
        </div>

        <section>
            <b-sidebar
                type="is-light"
                :fullheight="fullheight"
                :fullwidth="fullwidth"
                :overlay="overlay"
                :right="right"
                v-model="open"
            >
                <div class="p-4">
                    <h3 class="title is-4">LAND OWNER</h3>
                    <b-menu>
                        <b-menu-list label="Menu">
                            <b-menu-item icon="information-outline" label="Dashboard" tag="a" href="/landowner-dashboard"></b-menu-item>
                        </b-menu-list>

                        <b-menu-list>
                            <b-menu-item label="Boarding House" icon="link" tag="a" href="/boarding-house"></b-menu-item>
                        </b-menu-list>

                        <b-menu-list label="Actions">
                            <b-menu-item @click="logout" label="Logout"></b-menu-item>
                        </b-menu-list>
                    </b-menu>
                </div>
            </b-sidebar>
        </section>
    </div>

</template>

<script>
export default {
    data(){
        return{
            open: false,
            overlay: false,
            fullheight: true,
            fullwidth: false,
            right: false
        }
    },
    methods: {
        logout(){
            axios.post('/logout').then(()=>{
                window.location = '/';
            })
        }
    }
}
</script>

<style scoped>
.logo{
    padding: 0 30px 0 30px;
    height: 90px;
}

.burger-div{
    width: 20px;
    height: 3px;
    background-color: #696969;
    margin: 0 auto 3px 0;

    border-radius: 10px;
}

.burger-button{
    display: flex;
    flex-direction: column;
}

.mynav{
    padding: 25px;
    /*border-bottom: 2px solid rgba(22, 48, 69, 0.53);*/
    box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);
}

</style>
