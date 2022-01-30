<template>
    <section class="section">
        <div class="columns">

            
            
            <div class="column is-8 is-offset-2">

                <b-tabs type="is-boxed">
                    <b-tab-item>
                        <template #header>
                            <b-icon icon="account"></b-icon>
                            <span> REGISTER AS BOARDER</span>
                        </template>

                        <register-boarder></register-boarder>
                    </b-tab-item>
                    <b-tab-item>
                        <template #header>
                            <b-icon icon="source-pull"></b-icon>
                            <span> REGISTER AS OWNER </span>
                        </template>
                        <register-owner></register-owner>
                    </b-tab-item>
                </b-tabs>


                

            </div>
        </div>
    </section>
</template>

<script>


export default {




}
</script>

