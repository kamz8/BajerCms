<template>
  <!-- the modal -->
  <b-modal
    id="addUser"
    ref="modal"
    title="Dodaj urzytkownika"
    :ok-title="ok"
    :cancel-title="cancel"
    @ok="handleOk"
    @shown="clearForm"
  >
    <form @submit.prevent="handleSubmit">
      <div class="form-group">
        <label for="name">Nazwa Urzytkowika</label>
        <input
          id="name"
          v-model="user.name"
          type="text"
          class="form-control"
          :class="{'is-invalid': attemptSubmit && isValidate('name')}"
          placeholder="Wprowadź nazwę użytkownika"
        >
        <div class="invalid-feedback">
          <span
            v-for="(error, index) in fetchErrors.name"
            :key="index"
          >{{ error }}</span>
        </div>
      </div>
      <div class="form-group">
        <label for="password">Hasło</label>
        <input
          id="password"
          v-model="user.password"
          type="password"
          class="form-control"
          :class="{'is-invalid': attemptSubmit && isValidate('password')}"
          placeholder="Wprowadź hasło"
        >
        <div class="invalid-feedback">
          <span
            v-for="(error, index) in fetchErrors.password"
            :key="index"
          >{{ error }}</span>
        </div>
      </div>
      <div class="form-group">
        <label for="password">Potwierdź Hasło</label>
        <input
          id="confirmPassword"
          v-model="user.password_confirmation"
          type="password"
          class="form-control"
          :class="{'is-invalid': attemptSubmit && isValidate('password_confirmation')}"
          placeholder="Wprowadź hasło"
        >
        <div class="invalid-feedback">
          <span
            v-for="(error, index) in fetchErrors.password_confirmation"
            :key="index"
          >{{ error }}</span>
        </div>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input
          id="email"
          v-model="user.email"
          type="email"
          class="form-control"
          :class="{'is-invalid': attemptSubmit && isValidate('email')}"
          placeholder="Wprowadź email użytkownika"
        >
        <div class="invalid-feedback">
          <span
            v-for="(error, index) in fetchErrors.email"
            :key="index"
          >{{ error }}</span>
        </div>
      </div>
      <div class="form-group">
        <label for="roles">Role</label>
        <select
          id="roles"
          v-model="user.roles"
          multiple
          class="form-control"
          :class="{'is-invalid': attemptSubmit && isValidate('roles')}"
          name="roles[]"
        >
          <option
            v-for="(role, index) in roles"
            :key="index"
            v-bind="role.index"
            :value="role.id"
          >
            {{ role.name }}
          </option>
        </select>
        <small
          id="roleHelp"
          class="form-text text-muted"
        >Karzdy urzytkownik posiada jakąś rolę.</small>
        <div class="invalid-feedback">
          <span
            v-for="(error, index) in fetchErrors.roles"
            :key="index"
          >{{ error }}</span>
        </div>
      </div>
    </form>
  </b-modal>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      user: {
        name: '',
        password: '',
        password_confirmation: '',
        email: '',
        roles: [],
      },
      roles: [],
      fetchErrors: {
        status: 'false',
        message: [],
      },
      errorMessage: '',
      ok: 'Zapisz',
      cancel: 'Anuluj',
      attemptSubmit: false,
    };
  },
  created() {
    this.fetchRoles();
  },
  methods: {
    fetchRoles() {
      this.$http.get('/admin/users/create')
        .then((response) => response.json())
        .then((result) => {
          this.roles = result;
        });
    },
    clearForm() {
      this.user = {
        name: '',
        password: '',
        password_confirmation: '',
        email: '',
        roles: [],
      };
      this.attemptSubmit = false;
      this.fetchErrors = {};
    },
    handleOk(evt) {
      // Prevent modal from closing
      evt.preventDefault();
      this.handleSubmit();
    },
    handleSubmit() {
      const self = this;
      axios.post('/admin/users', this.user)
        .then((response) => {
          self.$store.state.users.push(response.data);
          self.clearForm();
          self.$refs.modal.hide();
        })
        .catch((error) => {
          if (error.response) {
            if (error.response.status === 400) {
              self.attemptSubmit = true;
              self.fetchErrors = error.response.data.errors;
            } else if (error.response.status === 500) {
              self.errorMessage = 'Błąd 500 - server zaliczył zgona! Postaramy się go jak najszybciej ogarnąć.';
            }
          }
        });
    },
    /* Validation statement
            *  @param key - json object key represent field id
            *  @return boolean
            * */
    isValidate(key) {
      return !!this.fetchErrors[key];
    },
  },
};
</script>

<style scoped>
.invalid-feedback > span{
    display: block;
}
</style>
