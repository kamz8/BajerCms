<template>
    <div>
        <v-header scrollTo="#ekipa" vtitle="O Klubie" coverImg="https://images.pexels.com/photos/761543/pexels-photo-761543.jpeg"></v-header>
        <section id="ekipa" class="content-box">
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