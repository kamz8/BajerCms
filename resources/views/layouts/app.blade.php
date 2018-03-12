<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Klub Studencki Bajer - strona logowania">
    <meta name="author" content="Kamil Żmijowski">
    @stack('meta')
    <title>Klub Studencki Bajer</title>
    <!-- Bootstrap core CSS-->
    <link href="{{asset('css//bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

</head>

<body>
<div id="app">
    @yield('content')
</div>
</body>

</html>