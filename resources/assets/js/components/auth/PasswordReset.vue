<template>
  <div class="col-6 mx-auto">
    <div class="card card-login mt-5">
      <div class="card-header">
        Resetuj swoje hasło
      </div>
      <div class="card-body">
        <form
          v-show="!success"
          class="form-horizontal"
          method="POST"
          @submit.prevent="resetPasswort"
        >
          <div class="form-group">
            <label
              for="InputEmail1"
              class="control-label"
            >Adres Email</label>
            <input
              id="InputEmail1"
              v-model="email"
              :disabled="processing"
              class="form-control"
              name="email"
              type="email"
              aria-describedby="emailHelp"
              placeholder="Email"
              :class="{'is-invalid': failedAuth}"
              required
              autofocus
            >
            <div
              v-show="failedAuth"
              class="invalid-feedback"
            >
              {{ error.message }}
            </div>
            <small
              v-show="!failedAuth"
              id="emailHelp"
              class="form-text text-muted"
            >Podaj adres email konta, do którego chcesz odzyskać hasło.</small>
          </div>
          <state-button
            v-model.sync="processing"
            :class="'btn-block'"
            type="submit"
            variant="primary"
            label="Wysyłanie..."
          >
            Resetuj hasło
          </state-button>
        </form>
        <b-alert
          variant="success"
          :show="success"
        >
          <h4 class="alert-heading">
            Wysłaliśmy email!
          </h4>
          Na podany wcześniej adres email wysłaliśmy link z kodem do resetowania hasła. Sprawdź skrzynkę mailową i postępuj zgodnie z instrukcją w mailu.
        </b-alert>
      </div>
    </div>
  </div>
</template>

<script>
import HTTP from '../../http-comon';
import StateButton from '../util/StateButton';

export default {
  name: 'PasswordReset',
  components: {
    StateButton,
  },
  data() {
    return {
      email: '',
      processing: false,
      error: [],
      success: false,
      failedAuth: false,
    };
  },
  methods: {
    resetPasswort() {
      this.processing = true;
      HTTP.post('auth/password/email', { email: this.email })
        .then(() => {
          this.success = true;
          this.processing = false;
          setTimeout(() => { this.$router.push('/'); }, 10000);
        }).catch((error) => {
          console.log(error.response.status === 400);

          if (error.response.status === 400) {
            this.failedAuth = true;
            this.error = error.response.data;
            this.processing = false;
          }
        });
    },
  },
};
</script>

<style scoped>

</style>
