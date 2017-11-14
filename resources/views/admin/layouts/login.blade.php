@extends('admin.layouts.app')
<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
            <form class="form-horizontal" method="POST" action="{{ route('login') }}>
            {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="InputEmail1" class="control-label">Adres Email</label>
                    <input class="form-control" id="InputEmail1" type="email" aria-describedby="emailHelp" placeholder="Email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="InputPassword1">Hasło</label>
                    <input class="form-control label-info" id="InputPassword1" type="password" placeholder="Hasło" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" {{ old('remember') ? 'checked' : '' }}> Zapamiętaj Mnie</label>
                    </div>
                </div>
                <a class="btn btn-primary btn-block" href="index.html">Zaloguj</a>
            </form>
            <div class="text-center">
                <a class="d-block small mt-3" href="register.html">Nowe konto</a>
                <a class="d-block small" href="forgot-password.html">Zapomniałeś hasła?</a>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<!-- Core plugin JavaScript-->
<script src="{{asset('js/jquery.easing.min.js')}}"></script>

