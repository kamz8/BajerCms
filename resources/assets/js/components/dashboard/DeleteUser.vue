<template>
  <!-- the modal -->
  <b-modal
    id="deleteUser"
    ref="modal"
    title="Dodaj urzytkownika"
    :ok-title="'Tak'"
    :cancel-title="'Nie'"
    @ok="handleOk"
  >
    Napeno chcesz to usunąć?
  </b-modal>
</template>

<script>
import axios from 'axios';

export default {
  name: 'DeleteUser',
  props: {
    id: {
      type: Number,
      default: 0
    }
  },
  methods: {
    handleOk(e) {
      e.preventDefault();
      const index = this.indexWhere(this.$store.state.users, (user) => user.id === this.id);
      axios.delete(`/admin/users/${this.id}`)
        .then((resault) => {
          this.setStoreMessage('alert', resault.data.status, resault.data.message);
          console.log(this.$store.state.uxMessage);
          this.$store.state.users.splice(index, 1);
          this.$refs.modal.hide();
        })
        .catch((error) => console.error(error));
    },
    setStoreMessage(type, status, message) {
      const messageObj = {
        type,
        status,
        message,
      };
      this.$store.state.uxMessage = messageObj;
    },
    indexWhere(array, conditionFn) {
      const item = array.find(conditionFn);
      return array.indexOf(item);
    },
  },
};
</script>

<style scoped>

</style>
