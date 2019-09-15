<template>
  <b-navbar
    id="mainNav"
    toggleable="md"
    type="light"
    :class="{'sticky bg-transparent': scrollPosition < headerHeight, 'sticky-top bg-gray': scrollPosition > headerHeight, }"
    :style="{marginBottom: colapseIn + 'px'}"
  >
    <div class="container">
      <router-link
        class="navbar-brand text-light text-u bajerfont"
        :to="{name:'home'}"
      >
        Bajer
      </router-link>
      <b-navbar-toggle
        target="nav_collapse"
        class="ml-auto navbar-toggler-right"
      >
        <i class="fa fa-bars" />
      </b-navbar-toggle>

      <b-collapse
        id="nav_collapse"
        is-nav
        @show="colapseIn = 92"
        @hide="colapseIn = 0"
      >
        <b-navbar-nav class="ml-auto text-uppercase">
          <li class="nav-item">
            <router-link
              class="nav-link"
              :to="{name:'about'}"
            >
              o klubie
            </router-link>
          </li>
          <li class="nav-item">
            <router-link
              class="nav-link"
              :to="{name:'people'}"
            >
              ekipa
            </router-link>
          </li>
          <li class="nav-item">
            <router-link
              class="nav-link"
              :to="{name:'offer'}"
            >
              oferta
            </router-link>
          </li>
          <li class="nav-item">
            <router-link
              class="nav-link"
              :to="{name:'booking-info'}"
            >
              wynajmy
            </router-link>
          </li>
          <li class="nav-item">
            <router-link
              class="nav-link"
              :to="{name:'contact'}"
            >
              kontakt
            </router-link>
          </li>
        </b-navbar-nav>
      </b-collapse>
    </div>
  </b-navbar>
</template>

<script>
import { mapGetters } from 'vuex';

export default {
  name: 'Navbar',
  data() {
    return {
      scrollPosition: 0,
      colapseIn: 0,
      header: undefined,
    };
  },
  computed: {
    ...mapGetters({
      logged: 'logged',
      user: 'user',
    }),
    headerHeight() {
      return this.$store.state.headerHeight;
    },
  },
  mounted() {
    this.header = document.getElementById('mainHeader');
    window.addEventListener('scroll', this.updateScroll);
  },
  methods: {
    updateScroll() {
      this.scrollPosition = window.scrollY;
    },
  }
};
</script>

<style>
  nav .navbar.fixed-top {
    background-color: #1b1e21cc !important;
  }

  nav.sticky {
    z-index: 10;
  }

  #mainHeader {
    margin-top: -74px;
  }

  .bg-gray {
    background-color: rgba(33, 33, 33, 0.8) !important;
  }

  nav.colapse-space {
    margin-bottom: 92px;
  }

  .dropdown-item {
    line-height: initial;
    font-size: 14px;
  }
</style>
