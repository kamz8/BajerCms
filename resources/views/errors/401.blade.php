@extends('layouts.app')
@section('content')
<div class="bg-img-login gradient-overlay">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <img class="img-responsive logo-xl mx-auto d-block" src="{{asset('img/bajer.png')}}" />
            </div>
        </div>
        <div class="row align-items-start" style="min-height: 100%">

        </div>
            <h2 class="text-uppercase">401 - brak uprawnień</h2>
            <br>
            <p class="text-center col-sm-12" style="font-size: 24px;">Nie masz uprawnień do wyświetenia tej strony. <a class="btn btn-xs btn-outline-light" href="{{redirect()->getUrlGenerator()->previous()}}">powrót do poprzedniej strony</a></p>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="{{asset('js/jquery.min.js')}}"></script
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<!-- Core plugin JavaScript-->
<script src="{{asset('js/jquery.easing.min.js')}}"></script>
@stop
