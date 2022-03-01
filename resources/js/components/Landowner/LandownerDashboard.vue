<template>
    <div>
        <div class="section">

            <div class="columns" v-if="is_approve < 1">
                <div class="column is-8 is-offset-2">
                    <b-notification
                            type="is-danger is-light"
                            aria-close-label="Close notification"
                            role="alert">
                        Account status is not yet approved. You cannot add boarding house at this moment.
                    </b-notification>
                </div>
            </div>
            <h1 class="title is-flex is-justify-content-center">LANDOWNER DASHBOARD</h1>
        </div>
           
    </div>
</template>

<script>
export default {
    props: ['propIsApprove'],

    data() {
        return{
            is_approve: 0,
        }
    },

    methods: {
        initData: function(){
            this.is_approve = parseInt(this.propIsApprove);
        }
    },

    mounted() {
        this.initData();
    }
}
</script>
