@extends('layouts.app')
@push('meta')
    <meta name="robots" content="noindex">
@endpush
@section('content')
<div class="bg-img-login gradient-overlay">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <img class="img-responsive logo-xl mx-auto d-block" src="{{asset('img/bajer.png')}}" />
            </div>
        </div>
        <div class="card card-login mx-auto mt-5">
            <div class="card-header">Login</div>
            <div class="card-body">
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="InputEmail1" class="control-label">Adres Email</label>
                        <input class="form-control" name="email" id="email" type="email" aria-describedby="emailHelp" placeholder="Email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="InputPassword1">Hasło</label>
                        <input class="form-control label-info" name="password" id="InputPassword1" type="password" placeholder="Hasło" required>
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
                    <button type="submit" class="btn btn-primary btn-block">Zaloguj</button>
                </form>
                <div class="text-center">
                    <a class="d-block small mt-3" href="{{route('register')}}">Nowe konto</a>
                    <a class="d-block small" href="{{url('/password/reset')}}">Zapomniałeś hasła?</a>
                </div>
        </div>
    </div>
    <div class="clearfix"></div>
        <footer class="col-xs-12 col-xl-12 text-center" style="color: white">
            <i class="fa fa-copyright"></i>&nbsp;BajerCMS 2017 - Created by <a href="http://www.webbooster.pl"></a>
        </footer>

</div>
<!-- Bootstrap core JavaScript-->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<!-- Core plugin JavaScript-->
<script src="{{asset('js/jquery.easing.min.js')}}"></script>

@endsection