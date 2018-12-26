<template>
    <div>
        <home-header></home-header>
        <section id="onas" class="content-box">
            <div class="container">
                <div class="row">
                    <article class="col-md-12 text-center">
                        <h1 class="text-uppercase pb-2">o klubie</h1>
                        <div class="mr-1 text-justify">
                            <p>
                                Jesteśmy agendą kultury, która zajmuje się organizacją imprez tanecznych, koncertów, aktywności sportowych oraz innych inicjatyw kulturalno-rozrywkowych dla studentów. Ponadto bardzo aktywnie współpracujemy z innymi organizacjami zapewniając na wydarzeniach oprawę muzyczną i zaplecze techniczne. Jeżeli idąc przez kampus uczelni słyszycie muzykę, widzicie tańczących ludzi tam na pewno nas spotkacie.
                                W tym roku Klub Studencki Bajer świętuje jubileusz 40-lecia działalności przy Politechnice Wrocławskiej. Jako jedna z nielicznych organizacji działających przy Politechnice możemy się pochwalić tak długą tradycją funkcjonowania.
                            </p>
                            <p>
                                Wydarzenia odbywają się w siedzibie naszego klubu, w Domu Studenckim T-15 na osiedlu akademickim Wittigowo.
                                Również ze względu na stale rosnące zainteresowanie coraz częściej organizowane działalności przenosimy poza mury akademika,
                                w miejsca, gdzie możemy zaprosić jeszcze więcej studentów.
                                Zapraszamy do stałego śledzenia naszych mediów społecznościowych, zamieszczamy tam wszystkie informacje na temat planowanych inicjatyw.
                            </p>
                        </div>
                        <router-link :to="{name:'about'}" class="btn btn-success text-uppercase center-block m-4">Czytaj dalej</router-link>
                    </article>
                </div>
            </div>
        </section>
        <section id="zespol" class="content-box overlay">
            <div class="container">
                <div class="row">
                    <article class="col-md-12 text-center">
                        <h1 class="text-uppercase pb-1">członkowie</h1>
                        <div class="mb-lg-4 mb-md-3 mb-sm-2 text-center text-light font-weight-light"
                             style="font-size: 24px">
                            <p>Nasza grupa to kreatywni ludzie, dla których nie ma rzeczy niemożliwych.</p>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-xs-12 text-center mb-4">
                                <figure class="member avatar mx-auto d-block">
                                    <img class="img-fluid rounded-circle"
                                         src="https://avatars.io/facebook/krzysztof.trybuszewski/large">
                                    <figcaption class="caption">
                                        <span>Krzysztow Trybuszewski</span>
                                        <span class="member-title">Prezes Zarządu</span>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="clearfix hidden-xs mb-4"></div>
                            <!--new line -->
                            <div class="col-md-3 col-xs-12 text-center">
                                <figure class="member avatar mx-auto d-block">
                                    <img class="img-fluid rounded-circle"
                                         src="https://avatars.io/facebook/kewin.galuszka/large">
                                    <figcaption class="caption">
                                        <span>Kewin Gałuszka</span>
                                        <span class="member-title">Wiceprezes</span>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="col-md-3 col-xs-12 text-center">
                                <figure class="member avatar mx-auto d-block">
                                    <img class="img-fluid rounded-circle"
                                         src="https://avatars.io/facebook/daria.jaworowska.1/large">
                                    <figcaption class="caption">
                                        <span>Daria Jaworska</span>
                                        <span class="member-title">Skarbnik</span>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="col-md-3 col-xs-12 text-center">
                                <figure class="member avatar mx-auto d-block">
                                    <img class="img-fluid rounded-circle"
                                         src="https://avatars.io/facebook/asderkg/large">
                                    <figcaption class="caption">
                                        <span>Jakub Grzybek</span>
                                        <span class="member-title">ds Klubu</span>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="col-md-3 col-xs-12 text-center">
                                <figure class="member avatar mx-auto d-block">
                                    <img class="img-fluid rounded-circle"
                                         src="https://avatars.io/facebook/100013585574066/large">
                                    <figcaption class="caption">
                                        <span>Sandra Mrzygłód</span>
                                        <span class="member-title">ds Promocji</span>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                        <router-link :to="{name:'people'}" class="btn btn-outline-light text-uppercase center-block m-5">zobacz wszytkich</router-link>
                    </article>
                </div>
            </div>
        </section>
<!--        <section id="wydarzenia" class="content-box">
            <div class="container">
                <div class="row">
                    <article class="col-md-12 text-center">
                        <h1 class="text-uppercase pb-4">wydarzenia</h1>
                        <facebook-events></facebook-events>
                    </article>
                </div>
            </div>
        </section>-->
        <section class="spotify">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12 col-md-6 visible-sm-inline-block">
                        <p class="m-0">Zobaczcie naszą nie powtarzalną imprezową składankę. </p>
                    </div>
                    <div class="col-12 col-md-4 offset-md-2">
                        <span class="bajerfont bajer-2x mr-2 mb-2 d-block d-md-inline mb-md-0 text-center">#AleBajer</span>
                        <a href="https://open.spotify.com/playlist/7x0EzxGOPef8DH4sh3zEoo" target="_blank" class="btn btn-md btn-outline-light text-light text-uppercase btn-lg-space d-none d-sm-inline btn-lg-space"
                           style="margin-top: -10px;">zobacz playlistę</a>
                        <a href="https://open.spotify.com/playlist/7x0EzxGOPef8DH4sh3zEoo" target="_blank" class="btn btn-sm btn-outline-light text-light text-uppercase d-block d-sm-none"
                           style="font-size: 12px">zobacz playlistę</a>
                    </div>
                </div>
            </div>
        </section>
        <section id="oferta" class="content-box bg-image" style="background-image: url('img/oferta-bg.jpg')">
            <div class="container">
                <div class="row">
                    <article class="col-md-12 text-center">
                        <h1 class="text-uppercase pb-4">nasza oferta</h1>
                        <div class="mr-1 text-center ">
                            <p>
                                Vivamus bibendum nibh at pretium condimentum. Proin consequat, metus at luctus
                                hendrerit, arcu sapien aliquam enim, in elementum purus nibh maximus massa. Quisque
                                ipsum nisl, porttitor quis pretium sed, molestie non est. Pellentesque ac faucibus. </p>
                        </div>
                        <router-link :to="{name:'offer'}" class="btn btn-outline-light text-uppercase center-block m-4">Czytaj dalej</router-link>
                    </article>
                </div>
            </div>
        </section>
        <section class="content-box">
            <div class="container">
                <div class="row">
                    <article class="col-md-12 text-center">
                        <h1 class="text-uppercase pb-4 pt-4">Wynajmij salę na własne porzeby</h1>
                        <p>

                            <span style="font-size:1.2em" class="text-bold">Już dzisiaj możesz zaplanować swoje wydarzenie w naszym Klubie.</span> </br>
                            Istnieje możliwość wynajęcia sali tanecznej do zorganizowania Waszego prywatnego przedsięwzięcia.
                            Urodziny, szkolenia, imprezy inauguracyjne, warsztaty, wykłady i prelekcje? Dla nas nie ważny jest powód, oddajemy Klub w Wasze ręce.
                            Skontaktuj się z Nami. Chętnie odpowiemy na wszystkie Twoje pytania, pomożemy dopełnić formalności, a Ty możesz już zapraszać gości.

                        </p>

                        <router-link :to="{name:'offer'}" class="btn btn-success text-uppercase mt-5 mb-4">dowiedz się więcej</router-link>
                    </article>
                </div>
            </div>
        </section>
    </div>

</template>

<script>
  // import FacebookEvents from "../util/FacbookEvents";
  import HomeHeader from "../page-part/HomeHeader";
  export default {
    name: "home",
    components: {HomeHeader}
  }
</script>

<style scoped>

</style>