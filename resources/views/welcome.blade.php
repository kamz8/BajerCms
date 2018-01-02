<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>
        <!-- Bootstrap core CSS-->
        <link href="{{asset('css//bootstrap.min.css')}}" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{asset('css/app.css')}}" >
        <!-- Styles -->
        <style>
            html, body {
                background-color: #32383e;
                color: #e5e5e5;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }
            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            .links > a {
                color: #d7d7d7;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .full-width{
                width: 100%;
                padding-bottom:80px;
            }
            header{
                position: relative;
            }
        </style>
    </head>
    <body>
        <div id="app"class="cotainer-fluid position-ref full-height">
            <header class="full-width">
                @if (Route::has('login'))
                    <nav class="top-right links">
                        @auth
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}">Login</a>
                            <a href="{{ route('register') }}">Register</a>
                        @endauth
                    </nav>
                @endif
            </header>

                <div class="container">
                    <div class="row">
                        <facebook-events></facebook-events>
                    </div>
                </div>
        </div>
        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
