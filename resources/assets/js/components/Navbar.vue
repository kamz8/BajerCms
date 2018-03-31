<template>
    <b-navbar toggleable="md" type="light" :class="{'sticky bg-transparent': scrollPosition < headerHeight, 'sticky-top bg-gray': scrollPosition > headerHeight }" id="mainNav">
        <div class="container">
            <a class="navbar-brand text-light text-u bajerfont" href="">Bajer</a>
            <b-navbar-toggle target="nav_collapse" class="ml-auto navbar-toggler-right">
                <i class="fa fa-bars"></i>
            </b-navbar-toggle>

            <b-collapse is-nav id="nav_collapse">
                <b-navbar-nav class="ml-auto text-uppercase">
                    <b-nav-item href="#">o klubie</b-nav-item>
                    <b-nav-item href="#">ekipa</b-nav-item>
                    <b-nav-item href="#">oferta</b-nav-item>
                    <b-nav-item href="#">wynajmy</b-nav-item>
                    <b-nav-item href="#">kontakt</b-nav-item>
                    <b-nav-item href="#"><a class="nav-buton btn btn-outline-primary btn-sm" href="#login">Zaloguj</a></b-nav-item>
                </b-navbar-nav>
            </b-collapse>

        </div>
    </b-navbar>
</template>

<script>
    export default {
        name: "navbar",
        data: function () {
            return {
                scrollPosition: 0,
                headerHeight: 0
            }
        },
        methods: {
            updateScroll() {
                this.scrollPosition = window.scrollY
            },
            calHeight () {
                this.headerHeight = document.getElementById('mainHeader').offsetHeight
            }
        },
        created() {
            window.addEventListener('scroll', this.updateScroll);
            console.log(this.headerHeight);
            this.calHeight()
        }
    }
</script>

<style>
nav .navbar.fixed-top{
    background-color: #1b1e21cc !important;
}
nav.sticky{
    z-index: 10;
}
    #mainHeader{
        margin-top: -92px;
    }
    .bg-gray{
        background-color: rgba(33, 33, 33, 0.8) !important;
    }
</style>