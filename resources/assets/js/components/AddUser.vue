<template>

    <!-- the modal -->
    <b-modal id="addUser">
        <form @submit.stop.prevent="handleSubmit">
            <b-form-input type="text"
                          placeholder="Enter your name"
                          v-model="User.name"></b-form-input>
        </form>
    </b-modal>

</template>

<script>
    export default {
    data: function () {
        return {
            user: {
                name: '',
                email: '',
                password:'',
                roles: '',
            },
            id: '',
        }
    },
        methods: {
            addToTable(id){
                console.log(`add to table ${id}`);
            },
            clearForm () {
                this.name = ''
            },
            handleOk (evt) {
                // Prevent modal from closing
                evt.preventDefault()
                if (!this.name) {
                    alert('Please enter your name')
                } else {
                    this.handleSubmit()
                }
            },
            handleSubmit () {
                this.names.push(this.user);
                this.clearForm();
                this.$refs.modal.hide();
            }
        }
    }
</script>