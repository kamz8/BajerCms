@extends('layouts.app')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand text-light text-u bajerfont" href="">Bajer</a>
            <button class="navbar-toggler navbar-toggler-right collapsed" type="button" data-toggle="collapse"
                    data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                    aria-label="Toggle navigation">
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
    <section id="zespol" class="content-box">
        <div class="container">
            <div class="row">
                <article class="col-md-12 text-center">
                    <h1 class="text-uppercase pb-1">członkowie</h1>
                    <div class="mb-lg-4 mb-md-3 mb-sm-2 text-center text-light font-weight-light" style="font-size: 24px">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
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
                                <img class="img-fluid rounded-circle" src="https://avatars.io/facebook/Bartuchaa/large">
                                <figcaption class="caption">
                                    <span>Bartosz Skokuń</span>
                                    <span class="member-title">Członek Zarządu</span>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="col-md-3 col-xs-12 text-center">
                            <figure class="member avatar mx-auto d-block">
                                <img class="img-fluid rounded-circle" src="https://avatars.io/facebook/mreemirates/large">
                                <figcaption class="caption">
                                    <span>Marta Emirsajłow</span>
                                    <span class="member-title">Członek Zarządu</span>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                    <a href="" class="btn btn-outline-light text-uppercase center-block m-5">zobacz wszytkich</a>
                </article>
            </div>
        </div>
    </section>
    <section class="content-box">
        <div class="container">
            <div class="row">
                <article class="col-md-12 text-center">
                    <h1 class="text-uppercase pb-4">wydarzenia</h1>
                    <facebook-events></facebook-events>
                </article>
            </div>
        </div>
    </section>
    <section class="spotify">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi mi ante, imperdiet sed consectetur ut, placerat id nunc.Donec tincidunt mollis.</p>
                </div>
                <div class="col-md-4 offset-2">
                    <span class="bajerfont bajer-2x">#AleBajer</span>
                    <a class="btn btn-md btn-outline-light text-light text-uppercase">zobacz playlistę</a>
                </div>
            </div>
        </div>
    </section>
    <section id="oferta" class="content-box bg-image" style="background-image: url('{{asset('img/oferta-bg.jpg')}}')">
        <div class="container">
            <div class="row">
                <article class="col-md-12 text-center">
                    <h1 class="text-uppercase pb-4">nasza oferta</h1>
                    <div class="mr-1 text-center ">
                        <p>
                            Vivamus bibendum nibh at pretium condimentum. Proin consequat, metus at luctus hendrerit, arcu sapien aliquam enim, in elementum purus nibh maximus massa. Quisque ipsum nisl, porttitor quis pretium sed, molestie non est. Pellentesque ac faucibus. </p>
                    </div>
                    <a href="" class="btn btn-outline-light text-uppercase center-block m-4">Czytaj dalej</a>
                </article>
            </div>
        </div>
    </section>
    <section class="content-box">
        <div class="container">
            <div class="row">
                <article class="col-md-12 text-center">
                    <h1 class="text-uppercase pb-4 pt-4">wynajem</h1>
                    <p>

                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi mi ante, imperdiet sed consectetur ut, placerat id nunc. Donec tincidunt mollis orci id placerat. Nulla at cursus arcu, eu volutpat lectus. Sed id euismod purus. Nam velit turpis, iaculis a quam at, volutpat tristique risus. Ut turpis nulla, lacinia ut pulvinar et, tristique ac dui. Quisque urna quam, tincidunt in dui sed, lacinia rhoncus felis. Sed finibus non diam pretium aliquet. Duis blandit lorem eget purus vulputate, a bibendum ante fringilla. Donec vitae ultrices odio. Maecenas sed congue ex, non interdum mi. Donec pellentesque iaculis sapien, accumsan tempus nulla volutpat at. </p>

                    <a class="btn btn-success text-uppercase mt-5 mb-4">dowiedz się więcej</a>
                </article>
            </div>
        </div>
    </section>
    <footer class="footer">
        <h2 class="text-uppercase text-center p-2">śledz nas</h2>
        <div class="container h-100">
            <div class="row align-items-center h-100">
                <div class="col-sm-6 col-md-2 col-md-offset-1">
                    <img class="img-fluid mx-auto d-block w-50" src="{{asset('img/bajer.png')}}">
                    <address class="text-center">
                        ul. Edwarda Wittiga 6 <br />
                        Akademik T-15 <br />
                        51-628 Wrocław <br />

                    </address>
                </div>
                <div class="col-sm-12 col-md-8">
                    <div class="social-icons">
                        <ul class="social-network social-circle text-dark">
                            <li><a href="#" class="Facebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="Instagram" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#" class="Snapchat" title="Snapchat"><i class="fa fa-snapchat-ghost"></i></a></li>
                            <li><a href="#" class="Spotify" title="Spotify"><i class="fa fa-spotify"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-2">
                    <a class="btn btn-light text-uppercase text-dark btn-block">kontakt</a>
                </div>
            </div>
        </div>
        <div class="subfooter"></div>
    </footer>
@endsection
