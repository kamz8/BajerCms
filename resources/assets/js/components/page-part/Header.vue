<template>
    <header id="mainHeader" class="masthead overlay" ref="mainHeader">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="logo mw-50">
                        <h1>{{title}}</h1>
                    </div>
                    <a href="#onas" class="btn btn-circle align-text-bottom mt-4" v-scroll-to="scrollTo">
                        <i class="fa fa-2x fa-angle-double-down"></i>
                    </a>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
    export default {
        name: "header",
        props: ['v-title','scrollTo']
    }
</script>

<style scoped>

</style>