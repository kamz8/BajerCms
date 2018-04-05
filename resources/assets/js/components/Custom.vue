<template>
    <div>
        <header id="mainHeader" class="masthead overlay" ref="mainHeader">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="logo mw-50">
                            <img src="img/bajer.png" class="img-fluid"/>
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
    </div>
</template>

<script>
    export default {
        name: "custom"
    }
</script>

<style scoped>

</style>