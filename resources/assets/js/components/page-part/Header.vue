<template>
  <header
    id="mainHeader"
    ref="mainHeader"
    class="cover-heading overlay"
    :style="'background-image: url('+coverImg+')'"
  >
    <div class="container mx-auto mh-100">
      <div class="row">
        <div class="col-lg-8 mx-auto pt-5 pb-5">
          <div class="logo">
            <h1>{{ vtitle }}</h1>
          </div>
          <a
            v-scroll-to="scrollTo"
            href="#onas"
            class="btn btn-circle align-text-bottom mt-4"
          >
            <i class="fa fa-2x fa-angle-double-down" />
          </a>
        </div>
      </div>
    </div>
  </header>
</template>

<script>
import elementResizeEvent from 'element-resize-event';
import { mapMutations } from 'vuex';
import { CHANGE_HEADER_HEIGHT } from '../../store/index';

export default {
  name: 'Header',
  props: {
    coverImg: {
      type: String,
      default: ''
    },
    vtitle: {
      type: String,
      default: ''
    },
    scrollTo: {
      type: String,
      default: ''
    }
  },
  computed: {
    headerHeight() {
      return this.$store.state.headerHeight;
    },
  },
  mounted() {
    const mainHeader = document.getElementById('mainHeader');
    this.changeHeaderHeight(mainHeader.offsetHeight);
    elementResizeEvent(mainHeader, this.headerHeightChangeListener);
  },
  methods: {
    ...mapMutations({
      changeHeaderHeight: CHANGE_HEADER_HEIGHT,
    }),
    headerHeightChangeListener() {
      const mainHeader = document.getElementById('mainHeader');
      const { headerHeight } = this;
      if (mainHeader.offsetHeight !== headerHeight) {
        this.changeHeaderHeight(mainHeader.offsetHeight);
      }
    },
  },
};
</script>

<style scoped>
  header.cover-heading {
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

  .cover-heading > .container {
    min-height: 400px;
  }
</style>
