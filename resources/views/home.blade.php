@extends('layouts.app')
@section('content')
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand text-light bajerfont" href="">KS Bajer</a>
            <button class="navbar-toggler navbar-toggler-right collapsed" type="button" data-toggle="collapse"
                    data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                    aria-label="Toggle navigation">
                Menu
                <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto text-uppercase">
                    <li class="nav-item">
                        <a class="nav-link" href="#about">o klubie</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#download">ekipa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#download">oferta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#download">wynajmy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">kontakt</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-buton btn btn-outline-primary btn-sm mt-2" href="#login">Zaloguj</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <header id="mainHeader" class="masthead overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="logo mw-50">
                        <img src="{{asset('img/bajer.png')}}" class="img-fluid"/>
                        <div class="sentence bajerfont">
                            <span>Nagłośnienie</span><span>Oświetlenie</span><span>Integracje</span>
                        </div>
                    </div>
                    <a href="#about" class="btn btn-circle align-text-bottom mt-4">
                        <i class="fa fa-2x fa-angle-double-down"></i>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <section class="content-box">
        <div class="container">
            <div class="row">
                <article class="col-md-12 text-center">
                    <h1 class="text-uppercase pb-2">o klubie</h1>
                    <div class="mr-1 text-justify">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ornare dictum dolor vitae viverra. Donec condimentum mattis tellus id vehicula. Aenean euismod risus id vestibulum consequat.
                            Mauris rhoncus, eros vel venenatis condimentum, diam erat dictum ipsum, nec tristique ligula tellus at lacus. Nullam ac sodales eros. Aliquam quis lacinia ipsum, eget mollis magna. Morbi odio ligula,
                            vehicula dignissim tempor a, hendrerit vitae dolor. Proin ullamcorper metus quis magna ultricies, non tincidunt dui luctus. Vivamus sed mi porttitor, euismod sapien id, fermentum nisi.</p>
                            <p>Proin vehicula non sapien a dapibus. Etiam eget nisl tincidunt, varius odio a, tempus augue. Maecenas at erat ut diam luctus hendrerit. Nunc accumsan quam vitae mi commodo vehicula.
                                Quisque sagittis sagittis mauris, a faucibus libero aliquet sit amet. Proin accumsan quam sit amet velit ultrices auctor. Donec venenatis maximus velit ut fermentum. </p>
                    </div>
                    <a href="" class="btn btn-success text-uppercase center-block m-4">Czytaj dalej</a>
                </article>
            </div>
        </div>
    </section>
    <section class="content-box bg-image" style="background-image: url('{{asset('img/zespol.jpg')}}')">
        <div class="container">
            <div class="row">
                <article class="col-md-12 text-center">
                    <h1 class="text-uppercase pb-4">członkowie</h1>
                    <div class="mr-1 text-center text-light" style="font-size: 24px">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xs-12 text-center mb-4">
                            <figure class="member avatar mx-auto d-block">
                                <img class="img-fluid rounded-circle" src="https://avatars.io/facebook/kasia.szybalska.5/large">
                                <figcaption class="caption">
                                    <span>Katarzyna Szybalska</span>
                                    <span class="member-title">Prezes Zarządu</span>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="clearfix hidden-xs mb-4"></div>
                        <!--new line -->
                        <div class="col-md-3 col-xs-12 text-center">
                            <figure class="member avatar mx-auto d-block">
                                <img class="img-fluid rounded-circle" src="https://avatars.io/facebook/dawid.chmiel.50/large">
                                <figcaption class="caption">
                                    <span>Dawid Chmiel</span>
                                    <span class="member-title">Zastępca Prezesa</span>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="col-md-3 col-xs-12 text-center">
                            <figure class="member avatar mx-auto d-block">
                                <img class="img-fluid rounded-circle" src="https://avatars.io/facebook/julia.borula/large">
                                <figcaption class="caption">
                                    <span>Julia Borula</span>
                                    <span class="member-title">Członek Zarządu</span>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="col-md-3 col-xs-12 text-center">
                            <figure class="member avatar mx-auto d-block">
                                <img class="img-fluid rounded-circle" src="https://avatars.io/facebook/damian.cieslak.560/large">
                                <figcaption class="caption">
                                    <span>Damian Cieślak</span>
                                    <span class="member-title">Członek Zarządu</span>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="col-md-3 col-xs-12 text-center">
                            <figure class="member avatar mx-auto d-block">
                                <img class="img-fluid rounded-circle" src="https://avatars.io/facebook/mpodgoreczny/large">
                                <figcaption class="caption">
                                    <span>Michał Podgóreczny</span>
                                    <span class="member-title">Członek Zarządu</span>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                    <a href="" class="btn btn-outline-light text-uppercase center-block m-4">zobacz wszytkich</a>
                </article>
            </div>
        </div>
    </section>
    <section class="content-box bg-image">
        <div class="container">
            <div class="row">
                <article class="col-md-12 text-center">
                    <h1 class="text-uppercase pb-4">wydarzenia</h1>

                </article>
            </div>
        </div>
    </section>
    <section>
        <div class="container">

        </div>
    </section>
    <section class="content-box bg-image">
        <div class="container">
            <div class="row">
                <article class="col-md-12 text-center">
                    <h1 class="text-uppercase pb-4">nasza oferta</h1>
                    <div class="mr-1 text-center">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ornare dictum dolor vitae viverra.</p>
                    </div>
                    <a href="" class="btn btn-outline-light text-uppercase center-block m-4">Czytaj dalej</a>
                </article>
            </div>
        </div>
    </section>
@endsection
