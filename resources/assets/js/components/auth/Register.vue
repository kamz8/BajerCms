<template>
    <div class="col-12 col-md-6 mx-auto">
        <div class="card card-login mt-5">
            <div class="card-header">Zarejestruj się</div>
            <div class="card-body">
                <form class="form-horizontal" method="POST" @submit.prevent="register">
                    <div class="form-group">
                        <label for="InputEmail1" class="control-label">Adres Email</label>
                        <b-form-input id="InputEmail1"
                                      v-model.trim="name"
                                      type="text"
                                      :state="nameState"
                                      aria-describedby="inputLiveHelp inputLiveFeedback"
                                      placeholder="Enter your name"></b-form-input>
                        <b-form-invalid-feedback id="inputLiveFeedback">
                            <!-- This will only be shown if the preceeding input has an invalid state -->
                            Enter at least 3 letters
                        </b-form-invalid-feedback>
                    </div>
                    <div class="form-group">
                        <label for="InputPassword">Hasło</label>
                        <b-form-input id="InputPassword"
                                      v-model.trim="name"
                                      type="text"
                                      :state="nameState"
                                      aria-describedby="inputLiveHelp inputLiveFeedback"
                                      placeholder="Enter your name"></b-form-input>
                        <b-form-invalid-feedback id="inputLiveFeedback">
                            <!-- This will only be shown if the preceeding input has an invalid state -->
                            Enter at least 3 letters
                        </b-form-invalid-feedback>

                    </div>
                    <div class="text-center">
                        <hr class="d-block small mt-3">
                    </div>

                    <state-button v-model="loading" :class="'btn-block'" type="submit" variant="primary"
                                  label="Rejestracja...">Zarejestruj
                    </state-button>
                </form>

            </div>
        </div>
    </div>
</template>

<script>
  import StateButton from '../util/StateButton'
  import { HTTP } from '../../http-comon'
  export default {
    components: {StateButton},
    name: "register",
    data() {
      return {
        user: {
          email: '',
          password: '',
          confirmPassword: '',
          firstName: ''
        },
        loading: false,
        errors: []
      }
    },
    methods: {
      register() {

      }
    },
  }
</script>

<style scoped>

</style>