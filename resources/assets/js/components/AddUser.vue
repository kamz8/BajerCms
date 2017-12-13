<template>

    <!-- the modal -->
    <b-modal id="addUser" title="Dodaj urzytkownika" ref="modal" :ok-title="ok" :cancel-title="cancel" @ok="handleOk"
             @shown="clearName">
        <form @submit.prevent="handleSubmit">
            <div class="form-group">
                <label for="name">Nazwa Urzytkowika</label>
                <input type="text" class="form-control" id="name" v-model="user.name" placeholder="Wprowadź nazwę użytkownika"  v-bind:class="{ isValid: 'isValid' }">
                <div class="invalid-feedback"></div>
            </div>
            <div class="form-group">
                <label for="password">Hasło</label>
                <input type="password" class="form-control" v-model="user.password" id="password" placeholder="Wprowadź hasło">
            </div>
            <div class="form-group">
                <label for="password">Potwierdź Hasło</label>
                <input type="password" class="form-control" v-model="user.password_confirmation" id="password" placeholder="Wprowadź hasło">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" v-model="user.email" placeholder="Wprowadź email użytkownika" required>
            </div>
            <div class="form-group">
                <label for="roles">Role</label>
                <select multiple class="form-control" id="roles" v-model="user.roles" >
                    <option v-for="role in roles" v-bind="role.index" :value="role.id">{{role.name}}</option>
                </select>
                <small id="roleHelp" class="form-text text-muted">Karzdy urzytkownik posiada jakąś rolę.</small>
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
            roles: [],
            fetchErrors: [],
            errorStatsment: false,
            ok: 'Zapisz',
            cancel: 'Anuluj'
        }
    },
        methods: {
            fetchRoles(){
                this.$http.get('/admin/users/create')
                    .then(response => response.json())
                     .then(result => this.roles = result)
            },
            clearName () {
                this.user = {
                    name: '',
                    password: '',
                    password_confirmation: '',
                    email: '',
                    roles: {}
                }
            },
            handleOk (evt) {
                // Prevent modal from closing
                evt.preventDefault();
                if (!this.user.name) {
                    alert('Please enter your name')
                } else {
                    this.handleSubmit()
                }
            },
            handleSubmit () {
                axios.post('/admin/users', this.user)
                    .then(function (response) {
                        console.log(response);
                        this.$store.state.users.push(this.user);
                        this.clearName();
                        this.$refs.modal.hide()
                    })
                    .catch(function (error) {
                        self.fetchErrors = error;
                        self.errorStatsment = true
                    });


            }
        },
        created: function(){
            this.fetchRoles();
        }
    }
</script>