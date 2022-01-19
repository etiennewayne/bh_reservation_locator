<template>
    <div>
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
                            <img class="footer-logo" src="/img/logo.png">
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




    </div> <!--root div-->
</template>

<script>
export default {

}
</script>
