<template>
    <div class="spiner h-100 justify-content-center align-items-center">
        <div class="">
            <i class="fa fa-spinner fa-spin align-self-center"></i>
        </div>
    </div>
</template>

<script>
  import { mapGetters } from 'vuex'
  export default {
    name: "popup",
      created() {
        // window.opener.console.log('ala')
        let code = this.$route.query.code
        this.$store.dispatch('socialLogin',{provider: 'facebook',code:code})
        // this.$store.commit('LOGGED')
        // window.opener.logged = true
      },
    computed: {
      ...mapGetters({
        logged: 'logged',
      })
    },
    watch: {
      logged () {
        // window.close()
        this.$router.push({path: '/',force: true})
      }
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