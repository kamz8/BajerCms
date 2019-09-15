<template>
  <div class="bg-img-login gradient-overlay">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <router-link :to="{name:'home'}">
            <img
              class="img-responsive logo-xl mx-auto d-block mt-4"
              src="/img/bajer.png"
            >
          </router-link>
        </div>
      </div>
      <router-view />

      <div class="clearfix" />
      <footer
        class="col-xs-12 col-xl-12 text-center"
        style="color: white"
      >
        <i class="fa fa-copyright" />&nbsp;BajerCMS 2017 - Created by Kamil Żmijowski
      </footer>
    </div>
  </div>
</template>

<script>
export default {
  name: 'AuthMain',
};
</script>

<style scoped>

</style>
