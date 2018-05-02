<template>
    <div class="col-6 mx-auto">
        <div class="card card-login mt-5">
            <div class="card-header">Resetuj swoje hało</div>
            <div class="card-body">
                <form class="form-horizontal" method="POST" >
                    <div class="text-center">
                        <hr class="d-block small mt-3">
                    </div>
                    <div class="form-group" >
                        <label for="InputEmail1" class="control-label">Adres Email</label>
                        <input class="form-control" v-model="credential.email" name="email" id="InputEmail1" type="email"
                               aria-describedby="emailHelp" placeholder="Email" required autofocus>
                        <!--<div v-show="failedAuth = false" class="form-control-feedback">Taki email nie istnieje.</div>-->
                    </div>
                    <!--<state-button v-model.sync="logging" :class="'btn-block'" type="submit" variant="primary" label="Logowanie...">Zaloguj</state-button>-->
                </form>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    name: "password-reset"
  }
</script>

<style scoped>

</style>