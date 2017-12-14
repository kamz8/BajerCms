<template>

    <!-- the modal -->
    <b-modal id="addUser" title="Dodaj urzytkownika" ref="modal" :ok-title="ok" :cancel-title="cancel" @ok="handleOk"
             @shown="clearForm">
        <form @submit.prevent="handleSubmit">
            <div class="form-group">
                <label for="name">Nazwa Urzytkowika</label>
                <input type="text" class="form-control"  v-bind:class="{'is-invalid': attemptSubmit && isValidate('name')}" id="name" v-model="user.name" placeholder="Wprowadź nazwę użytkownika">
                <div class="invalid-feedback"><span v-for="error in fetchErrors.name">{{error}}</span></div>
            </div>
            <div class="form-group">
                <label for="password">Hasło</label>
                <input type="password" class="form-control" v-bind:class="{'is-invalid': attemptSubmit && isValidate('password')}" v-model="user.password" id="password" placeholder="Wprowadź hasło">
                <div class="invalid-feedback"><span v-for="error in fetchErrors.password">{{error}}</span></div>
            </div>
            <div class="form-group">
                <label for="password">Potwierdź Hasło</label>
                <input type="password" class="form-control" v-bind:class="{'is-invalid': attemptSubmit && isValidate('password_confirmation')}" v-model="user.password_confirmation" id="password" placeholder="Wprowadź hasło">
                <div class="invalid-feedback"><span v-for="error in fetchErrors.password_confirmation">{{error}}</span></div>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" v-bind:class="{'is-invalid': attemptSubmit && isValidate('email')}" id="email" v-model="user.email" placeholder="Wprowadź email użytkownika">
                <div class="invalid-feedback"><span v-for="error in fetchErrors.email">{{error}}</span></div>
            </div>
            <div class="form-group">
                <label for="roles">Role</label>
                <select multiple class="form-control" v-bind:class="{'is-invalid': attemptSubmit && isValidate('roles')}" id="roles" name="roles[]" v-model="user.roles" placeholder="Wprowadź email użytkownika">
                    <option v-for="role in roles" v-bind="role.index" :value="role.id">{{role.name}}</option>
                </select>
                <small id="roleHelp" class="form-text text-muted">Karzdy urzytkownik posiada jakąś rolę.</small>
                <div class="invalid-feedback"><span v-for="error in fetchErrors.roles">{{error}}</span></div>
            </div>
        </form>
    </b-modal>

</template>

<script>
    export default {
    data: function () {

        return {
            user: {
                name: '',
                password: '',
                password_confirmation: '',
                email: '',
                roles: []
            },
            fetchErrors: {
                status:"false",
                message: []
            },
            errorMessage: '',
            ok: 'Zapisz',
            cancel: 'Anuluj',
            attemptSubmit: false
        }
    },
        methods: {
            fetchRoles(){
                var self = this;
                 this.$http.get('http://localhost:8000/admin/users/create')
                    .then(response => response.json())
                     .then(result => this.roles = result)
            },
            clearForm () {
                this.user = {
                    name: '',
                    password: '',
                    password_confirmation: '',
                    email: '',
                    roles: []
                };
                this.attemptSubmit = false;
                this.fetchErrors = {};
            },
            handleOk (evt) {
                // Prevent modal from closing
                evt.preventDefault();
                this.handleSubmit()
            },
            handleSubmit () {
                let self = this;
                axios.put(`/admin/users/{$id}`, this.user)
                    .then(function (response){
                        self.$store.state.users.push(response.data);
                        self.clearForm();
                        self.$refs.modal.hide();
                    })
                    .catch(function (error) {
                        if(error.response){
                            if(error.response.status == 400){
                                self.attemptSubmit = true
                                self.fetchErrors = error.response.data.errors

                            }else if(error.response.status == 500){
                                self.errorMessage = "Błąd 500 - server zaliczył zgona! Postaray się go jak najszybciej ogarnąć."
                            }
                        }


                    });

            },
            /* Validation statement
            *  @param key - json object key represent field id
            *  @return boolean
            * */
            isValidate: function(key){
                var status = false;
                if(this.fetchErrors.hasOwnProperty(key)) status = true;
                else status = false;
                return status;
            }
        },
        created: function(){
            this.fetchRoles();
        }
    }
</script>

<style scoped>
.invalid-feedback > span{
    display: block;
}
</style>