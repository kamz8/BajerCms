<template>
  <div>
    <navbar />
    <router-view />

    <main-footer />
    <to-top />
  </div>
</template>

<script>
import Navbar from './page-part/Navbar';
import ToTop from '../components/util/ToTop';
import MainFooter from './page-part/MainFooter';

export default {
  name: 'MainTemplate',
  components: {
    Navbar,
    ToTop,
    MainFooter,
  },
};
</script>

<style scoped>

</style>
