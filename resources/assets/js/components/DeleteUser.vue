<template>
    <!-- the modal -->
    <b-modal id="deleteUser" title="Dodaj urzytkownika" ref="modal" :ok-title="'Tak'" :cancel-title="'Nie'"
             @ok="handleOk">
        Napeno chcesz to usunąć?
    </b-modal>

</template>

<script>
    export default {
        name: "delete-user",
        props: ['id'],
        methods: {
            handleOk: function (e) {
                e.preventDefault();
                var index = this.indexWhere(this.$store.state.users, user => user.id === this.id);
                axios.delete(`/admin/users/${this.id}`)
                    .then(resault => {
                        this.setStoreMessage('alert', resault.data.status, resault.data.message);
                        console.log(this.$store.state.uxMessage);
                        this.$store.state.users.splice(index, 1);
                        this.$refs.modal.hide()
                    })
                    .catch(error => console.error(error))
            },
            setStoreMessage: function (type, status, message) {
                let messageObj = {
                    type: type,
                    status: status,
                    message: message
                };
                this.$store.state.uxMessage = messageObj
            },
            indexWhere: function (array, conditionFn) {
                const item = array.find(conditionFn)
                return array.indexOf(item)
            }
        }
    }
</script>

<style scoped>

</style>