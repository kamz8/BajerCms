<template>
  <header id="mainHeader" class="masthead overlay" ref="mainHeader">
    <div class="container">
      <div class="row">
        <div class="col mx-auto">
          <div class="logo">
            <img src="img/bajer.png" class="bajer-logo"/>
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
  import elementResizeEvent from 'element-resize-event';
  import {CHANGE_HEADER_HEIGHT} from '../../store/index';
  import {mapMutations} from 'vuex';

  export default {
    name: "header",
    mounted: function () {
      const mainHeader = document.getElementById('mainHeader');
      this.changeHeaderHeight(mainHeader.offsetHeight)
      elementResizeEvent(mainHeader, this.headerHeightChangeListener)
    },
    computed: {
      headerHeight: function () {
        return this.$store.state.headerHeight;
      }
    },
    methods: {
      ...mapMutations({
        changeHeaderHeight: CHANGE_HEADER_HEIGHT
      }),
      headerHeightChangeListener: function () {
        const mainHeader = document.getElementById('mainHeader');
        const headerHeight = this.headerHeight;
        if (mainHeader.offsetHeight !== headerHeight) {
          this.changeHeaderHeight(mainHeader.offsetHeight);
        }
      }
    }
  }
</script>

<style scoped>
  .masthead {
    height: 300px;
  }
  
  .bajer-logo {
    max-width: 75%;
    height: auto;
  }
</style>
