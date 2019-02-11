<template>
    <div class="col-12 col-md-6 mx-auto">
        <div class="card card-login mt-5">
            <div class="card-header">Zaloguj się</div>
            <div class="card-body">
                <div class="text-center">
                    <p class="text-center text-muted">Zaloguj przy pomocy:</p>
                    <b-button variant="primary" class="btn-block" style="background-color: #3B5998" @click="fbLogin('facebook')"><i class="fa fa-facebook"></i>  Facebook</b-button>
                    <div class="or-seperator"><i>lub</i></div>
                </div>
                <form class="form-horizontal" method="POST" @submit.prevent="auth">
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
                            <b-form-checkbox id="checkbox1"
                                             v-model="credential.rememberMe">
                                Zapamiętaj Mnie
                             </b-form-checkbox>
                            </label>
                        </div>
                    </div>
                    <state-button v-model="logging" :class="'btn-block'" type="submit" variant="primary" label="Logowanie...">Zaloguj</state-button>
                </form>
                <div class="text-center">
                    <router-link class="d-block small mt-3" :to="{name:'register'}">Nowe konto</router-link>
                    <router-link class="d-block small" :to="{name:'passwordReset'}">Zapomniałeś hasła?</router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  import { HTTP } from '../../http-comon'
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
        logging: false,
        wmLogged: window.logged
      }
    },
    methods: {
      auth () {
        setTimeout(() =>{this.logging = true}, 1)

        var self = this
        this.$store.dispatch('login', this.credential)
        setTimeout(() =>{self.logging = false}, 500)
        this.$router.push({path: '/',force: true})
      },
      fbLogin(provider) {
        HTTP.get(`auth/${provider}`)
          .then(response => {
            let popup = window.open(response.data,'_self')
          })
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
      wmLogged(){
        this.$router.push({path: '/',force: true})
      }
    }
  }
</script>

<style scoped>
    .form-check-label {
        padding-left: 0;
    }
</style>