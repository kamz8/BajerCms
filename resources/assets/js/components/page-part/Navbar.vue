<template>
    <b-navbar toggleable="md" type="light" :class="{'sticky bg-transparent': scrollPosition < headerHeight, 'sticky-top bg-gray': scrollPosition > headerHeight, }" :style="{marginBottom: colapseIn + 'px'}" id="mainNav">
        <div class="container">
            <router-link class="navbar-brand text-light text-u bajerfont" :to="{name:'home'}">Bajer</router-link>
            <b-navbar-toggle target="nav_collapse" class="ml-auto navbar-toggler-right" >
                <i class="fa fa-bars"></i>
            </b-navbar-toggle>

            <b-collapse is-nav id="nav_collapse" v-on:show="colapseIn = 92" v-on:hide="colapseIn = 0">
                <b-navbar-nav class="ml-auto text-uppercase">
                    <li class="nav-item"><router-link class="nav-link" :to="{name:'about'}">o klubie</router-link></li>
                    <li class="nav-item"><router-link class="nav-link" :to="{name:'people'}">ekipa</router-link></li>
                    <li class="nav-item"><router-link class="nav-link" :to="{name:'offer'}">oferta</router-link></li>
                    <li class="nav-item"><router-link class="nav-link" :to="{name:'booking-info'}">wynajmy</router-link></li>
                    <li class="nav-item"><router-link class="nav-link" :to="{name:'contact'}">kontakt</router-link></li>
                 <!--It was diabled for first release-->
                    <!--<li class="nav-item"><span class="nav-link"><router-link class="nav-buton btn btn-outline-light btn-sm" :to="{name:'booking'}">zarezerwuj</router-link></span></li>-->
<!--                    <b-nav-item href="#">
                        <router-link v-show="!logged" class="nav-buton btn btn-outline-primary btn-sm" :to="{name:'login'}">Zaloguj</router-link>
                        <b-dropdown v-show="logged" id="down-user" :text="user.name" size="sm" variant="primary" class="m-2">
                            <b-dropdown-item href="#"><i class="fa fa-user-circle"></i> Profil</b-dropdown-item>
                            <b-dropdown-item href="#"><i class="fa fa-calendar"></i> Moje rezerwacje</b-dropdown-item>
                            <b-dropdown-item href="#" v-show="user.role ==='admin' || user.roles ==='moderator' || user.role ==='consoltant' || user.role ==='super_admin' "><i class="fa fa-dashboard"></i> Panel Admina</b-dropdown-item>
                            <b-dropdown-divider></b-dropdown-divider>
                            <b-dropdown-item to="/logout"><i class="fa fa-sign-out"></i> Wyloguj</b-dropdown-item>
                        </b-dropdown>
                    </b-nav-item>-->
                </b-navbar-nav>
            </b-collapse>

        </div>
    </b-navbar>
</template>

<script>
  import { mapGetters } from 'vuex'
    export default {
        name: "navbar",
        data: function () {
            return {
                scrollPosition: 0,
                headerHeight: 0,
                colapseIn: 0,

            }
        },
        methods: {
            updateScroll() {
                this.scrollPosition = window.scrollY
            },
            calHeight () {
                this.headerHeight = document.getElementById('mainHeader').offsetHeight
            },
            collapseing() {
                return this.colapseIn = !this.colapseIn
            }
        },
        mounted() {
            window.addEventListener('scroll', this.updateScroll);
            console.log(this.headerHeight);
            this.calHeight()
        },
        computed: {
          ...mapGetters({
            logged: 'logged',
            user: 'user'
          }),
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
        margin-top: -74px;
    }
    .bg-gray{
        background-color: rgba(33, 33, 33, 0.8) !important;
    }
    nav.colapse-space{
        margin-bottom: 92px;
    }
    .dropdown-item{
      line-height: initial;
      font-size: 14px;
    }
</style>
