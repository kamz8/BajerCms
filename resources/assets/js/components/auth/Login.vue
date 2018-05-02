<template>
    <div class="col-6 mx-auto">
        <div class="card card-login mt-5">
            <div class="card-header">Zaloguj się</div>
            <div class="card-body">
                <form class="form-horizontal" method="POST" @submit.prevent="auth">
                    <div class="text-center">
                        <hr class="d-block small mt-3">
                    </div>
                    <div class="form-group" :class="{'danger':failedAuth}">
                        <label for="InputEmail1" class="control-label">Adres Email</label>
                        <input class="form-control" v-model="credential.email" name="email" id="InputEmail1" type="email"
                               aria-describedby="emailHelp" placeholder="Email" required autofocus>
                        <div v-show="failedAuth" class="form-control-feedback">Błędny login lub hasło.</div>
                    </div>
                    <div class="form-group">
                        <label for="InputPassword1">Hasło</label>
                        <input class="form-control label-info" v-model="credential.password" name="password" id="InputPassword1" type="password"
                               placeholder="Hasło" required>

                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" v-model="credential.rememberMe" type="checkbox"> Zapamiętaj Mnie</label>
                        </div>
                    </div>
                    <state-button v-model.sync="logging" :class="'btn-block'" type="submit" variant="primary" label="Logowanie...">Zaloguj</state-button>
                </form>
                <div class="text-center">
                    <a class="d-block small mt-3" href="">Nowe konto</a>
                    <a class="d-block small" href="/password/reset">Zapomniałeś hasła?</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  import { mapGetters } from 'vuex'
  import StateButton from '../util/StateButton'

  export default {
    components: {StateButton},
    name: "login",
    component: {
      StateButton
    },
    data () {
      return {
        credential:{
          email: '',
          password: '',
          rememberMe: Boolean
        },
        logging: false
      }
    },
    methods: {
      auth () {
        this.logging = true
        var self = this
        this.$store.dispatch('login', this.credential).then((x =this.logging)=>{
          self.logging = false
        })
        setTimeout(() =>{this.logging = false}, 1)
      }
    },
    computed: {
      ...mapGetters({
        logged: 'logged',
        failedAuth: 'failedAuth',
      }),
    },
    watch: {
      logged () {
        this.$router.push({path: '/',force: true})
      },
    }
  }
</script>

<style scoped>

</style>