<template>
    <header id="mainHeader" class="masthead overlay" ref="mainHeader">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="logo mw-50">
                        <img src="img/bajer.png" class="img-fluid"/>
                        <div class="sentence bajerfont">
                            <span>Nagłośnienie</span><span>Oświetlenie</span><span>Integracje</span>
                        </div>
                    </div>
                    <a href="#about" class="btn btn-circle align-text-bottom mt-4" v-scroll-to="'#onas'">
                        <i class="fa fa-2x fa-angle-double-down"></i>
                    </a>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
    export default {
        name: "header"
    }
</script>

<style scoped>

</style>