<!--
Custom page is standard template for all static page.
When we create new page - you copy of template below and name as NameOfPage
-->
<template>
    <div>
        <map-header scrollTo="#zarzand" vtitle="Kontakt" ></map-header>
        <section id="kontakt" class="content-box">
            <div class="container">
                <div class="row">
                    <article class="col-md-12 text-center">
                        <h1 class="text-uppercase pb-2">Kontakt</h1>
                        <div class="mr-1 text-justify">

                        </div>
                    </article>
                </div>
            </div>
        </section>
        <section id="zarząd" class="content-box">
            <div class="container">
                <div class="row">
                    <article class="col-md-12 text-center">
                        <h1 class="text-uppercase pb-2">Zarząd</h1>
                        <div class="row mr-1 text-justify">
                            <div class="col-md-4 col-12">
                                <avatar
                                        name="Krzysztof Trybuszewski"
                                        memberType="Prezes"
                                        avatar-img="https://scontent.fpoz1-1.fna.fbcdn.net/v/t1.0-9/41499478_1394415154028911_1216649563624964096_n.jpg?_nc_cat=0&oh=08cd631dacff62bc23e1cd414c4073a2&oe=5C36A8B6"
                                        phone="668751336"
                                        email="kamzil2@gmail.com"></avatar>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>
        <section id="dj" class="content-box">
            <div class="container">
                <div class="row">
                    <article class="col-md-12 text-center">
                        <h1 class="text-uppercase pb-2">DJ-je</h1>
                        <div class="row mr-1 text-justify">
                            <div class="col-md-4 col-12">
                                <avatar
                                  name="DJ Kamz"
                                  avatar-img="https://scontent.fpoz1-1.fna.fbcdn.net/v/t1.0-9/19657282_1363116423796026_1587300144022569518_n.jpg?_nc_cat=0&oh=04bc4935cfb044d84002812fcd9b1cf1&oe=5C277DD8"
                                  phone="668751336"
                                  email="kamzil2@gmail.com"></avatar>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>
        <section id="fotografowie" class="content-box">
            <div class="container">
                <div class="row">
                    <article class="col-md-12 text-center">
                        <h1 class="text-uppercase pb-2">fotografowie</h1>
                        <div class="mr-1 text-justify">

                        </div>
                    </article>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import MapHeader from '../page-part/HeaderMap'
import Avatar from '../page-part/Avatar'

export default {
  name: "custom",
  components: {
    MapHeader,
    Avatar
  }
}
</script>

<style scoped>

</style>