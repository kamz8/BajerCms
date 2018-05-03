<template>
    <div class="spiner h-100 justify-content-center align-items-center">
        <div class="">
            <i class="fa fa-spinner fa-spin align-self-center"></i>
        </div>
    </div>
</template>

<script>
  export default {
    name: "popup",
      mounted() {
        let code = this.$route.query.code
        this.$store.dispatch('socialLogin',{provider: 'facebook',code:code})
      }
  }
</script>

<style scoped>
.spiner{
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0

}
.spiner > div > i {
    font-size: 80px;
    color: #cccccc;
}
</style>