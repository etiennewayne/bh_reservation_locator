<template>
    <div>
        {{data}}
    </div>
</template>


<script>
export default {
    props: {
        propData:{
            type: String,
            default: '',
        }
    },
    data() {
        return{
            data: [],
        }
        
    },

    methods: {

    },

    mounted() {
        this.data = JSON.stringify(this.propData);
    }
}
</script>