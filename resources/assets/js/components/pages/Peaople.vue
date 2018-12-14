<template>
    <div>
        <v-header scrollTo="#ekipa" vtitle="Ekipa" coverImg="https://scontent.fpoz1-1.fna.fbcdn.net/v/t1.0-9/32639675_2033682436644284_7713636091089125376_o.jpg?_nc_cat=0&oh=92c715ab9e6258e18c8068551c9a49cd&oe=5C2E28B0"></v-header>
        <section id="ekipa" class="content-box">
            <div class="container">
                <div class="row">
                    <article class="col-md-12 text-center">
                        <h2 class="text-uppercase pb-1">Zarząd</h2>
                        <div class="mb-lg-4 mb-md-3 mb-sm-2 text-center text-light font-weight-light" style="font-size: 24px">
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

                    </article>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    import vHeader from '../page-part/Header'
    export default {
        name: "about",
        components: {
            vHeader
        }
    }
</script>

<style scoped>

</style>