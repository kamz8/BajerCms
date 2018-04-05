<template>
    <div class="bg-img-login gradient-overlay">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <router-link :to="{name:'home'}"><img class="img-responsive logo-xl mx-auto d-block mt-4" src="img/bajer.png" /></router-link>
                </div>
            </div>
            <div class="col-6 mx-auto">
                <div class="card card-login mt-5">
                    <div class="card-header">Zaloguj się</div>
                    <div class="card-body">
                        <form class="form-horizontal" method="POST">
                            <div class="text-center">
                                <hr class="d-block small mt-3">
                            </div>
                            <div class="form-group">
                                <label for="InputEmail1" class="control-label">Adres Email</label>
                                <input class="form-control" name="email" id="InputEmail1" type="email" aria-describedby="emailHelp" placeholder="Email" required autofocus>
                            </div>
                            <div class="form-group ">
                                <label for="InputPassword1">Hasło</label>
                                <input class="form-control label-info" name="password" id="InputPassword1" type="password" placeholder="Hasło" required>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox"> Zapamiętaj Mnie</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Zaloguj</button>
                        </form>
                        <div class="text-center">
                            <a class="d-block small mt-3" href="">Nowe konto</a>
                            <a class="d-block small" href="/password/reset">Zapomniałeś hasła?</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>
            <footer class="col-xs-12 col-xl-12 text-center" style="color: white">
                <i class="fa fa-copyright"></i>&nbsp;BajerCMS 2017 - Created by Kamil Żmijowski
            </footer>

        </div>
    </div>
</template>

<script>
    export default {
        name: "login"
    }
</script>

<style scoped>

</style>