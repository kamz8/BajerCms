<template>
  <div
    class="affix-top position-fixed"
    :class="{'d-block': scrollPosition > 900, 'd-none': scrollPosition < 900}"
  >
    <a
      v-scroll-to="'#app'"
      class="btn btn-sm btn-dark"
    >
      <i class="fa fa-chevron-up fa-2x" />
    </a>
  </div>
</template>

<script>
export default {
  name: 'ToTop',
  data() {
    return {
      scrollPosition: 0,
      headerHeight: 0,
    };
  },
  created() {
    window.addEventListener('scroll', this.updateScroll);
  },
  methods: {
    updateScroll() {
      this.scrollPosition = window.scrollY;
    },
    scrollToTop() {
      this.$nextTick(() => {
      });
    },
  },
};
</script>

<style scoped>
.affix-top{
    bottom: -50px;
    right: 0;

    padding: 15px;
}
.affix-top.d-block{
    bottom: 0;
    transition: bottom ease-in .3s;
}
.affix-top.d-none{
    bottom: -50px;
    transition: bottom ease-in .3s;
}
</style>
