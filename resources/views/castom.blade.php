@extends('layouts.app')

@section('content')
    <navbar></navbar>
    <header id="mainHeader" class="masthead overlay" ref="mainHeader">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="logo mw-50">
                        <img src="{{asset('img/bajer.png')}}" class="img-fluid"/>
                        <div class="sentence bajerfont">
                            <span>Nagłośnienie</span><span>Oświetlenie</span><span>Integracje</span>
                        </div>
                    </div>
                    <a href="#about" class="btn btn-circle align-text-bottom mt-4" v-scroll-to="'#onas'">
                        <i class="fa fa-2x fa-angle-double-down"></i>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <section id="onas" class="content-box">
        <div class="container">
            <div class="row">
                <article class="col-md-12 text-center">
                    <h1 class="text-uppercase pb-2">Jakiś tytuł strony</h1>
                    <div class="mr-1 text-justify">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ornare dictum dolor vitae viverra. Donec condimentum mattis tellus id vehicula. Aenean euismod risus id vestibulum consequat.
                            Mauris rhoncus, eros vel venenatis condimentum, diam erat dictum ipsum, nec tristique ligula tellus at lacus. Nullam ac sodales eros. Aliquam quis lacinia ipsum, eget mollis magna. Morbi odio ligula,
                            vehicula dignissim tempor a, hendrerit vitae dolor. Proin ullamcorper metus quis magna ultricies, non tincidunt dui luctus. Vivamus sed mi porttitor, euismod sapien id, fermentum nisi.</p>
                            <p>Proin vehicula non sapien a dapibus. Etiam eget nisl tincidunt, varius odio a, tempus augue. Maecenas at erat ut diam luctus hendrerit. Nunc accumsan quam vitae mi commodo vehicula.
                                Quisque sagittis sagittis mauris, a faucibus libero aliquet sit amet. Proin accumsan quam sit amet velit ultrices auctor. Donec venenatis maximus velit ut fermentum. </p>
                    </div>
                </article>
            </div>
        </div>
    </section>
    <footer class="footer">
        <h2 class="text-uppercase text-center p-2">śledź nas</h2>
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
                    <div class="social-icons text-center">
                        <ul class="social-network social-circle text-dark">
                            <li><a href="https://www.facebook.com/Klub.Studencki.Bajer/" class="Facebook" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://www.instagram.com/klub.studencki.bajer/" class="Instagram" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="https://www.snapchat.com/add/ksbajer" class="Snapchat" title="Snapchat" target="_blank"><i class="fa fa-snapchat-ghost" ></i></a></li>
                            <li><a href="https://open.spotify.com/user/klubstudenckibajer?si=ri5LY5koQrKIG5bkSbEi1w" class="Spotify" title="Spotify" target="_blank"><i class="fa fa-spotify"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-2">
                    <a class="btn btn-light text-uppercase text-dark btn-block btn-lg-space  mt-5 mt-sm-0">kontakt</a>
                </div>
            </div>
        </div>

    </footer>
    <div class="subfooter text-center text-md-right">
        <div class="container">
            <span>&copy; Bajer 2018 | Created by Kamil Żmijowski</span>
        </div>
    </div>
    <to-top></to-top>
@endsection
