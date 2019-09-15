<template>
  <header
    id="mainHeader"
    ref="mainHeader"
    class="masthead overlay"
  >
    <div class="container">
      <div class="row">
        <div class="col mx-auto">
          <div class="logo">
            <img
              src="img/bajer.png"
              class="bajer-logo"
            >
            <div class="sentence bajerfont">
              <span>Nagłośnienie</span><span>Oświetlenie</span><span>Integracje</span>
            </div>
          </div>
          <a
            v-scroll-to="'#onas'"
            href="#about"
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
  .masthead {
    height: 300px;
  }

  .bajer-logo {
    max-width: 75%;
    height: auto;
  }
</style>
