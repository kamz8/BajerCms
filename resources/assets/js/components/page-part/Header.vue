<template>
    <header id="mainHeader" class="cover-heading overlay" ref="mainHeader" :style="'background-image: url('+coverImg+')'">
        <div class="container mx-auto mh-100">
            <div class="row">
                <div class="col-lg-8 mx-auto pt-5 pb-5">
                    <div class="logo">
                        <h1>{{vtitle}}</h1>
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
        props: ['vtitle','scrollTo','coverImg']
    }
</script>

<style scoped>
    header.cover-heading{
        display: table;
        width: 100%;
        height: 300px;
        padding: 80px 0;
        text-align: center;
        color: #fff;
        background-color: rgba(0, 0, 0, 0);
        background-position: center center;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
    .cover-heading > .container{
        min-height: 400px;
    }
</style>