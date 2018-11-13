<!--
Custom page is standard template for all static page.
When we create new page - you copy of template below and name as NameOfPage
-->
<template>
    <div>
        <map-header scrollTo="#zarzand" vtitle="Kontakt" />
        <section id="kontakt" class="content-box">
            <div class="container">
                <div class="row">
                    <article class="col-md-12 text-center">
                        <h1 class="text-uppercase pb-2">Kontakt</h1>
                        <div class="row mr-1 text-justify">
                            <div class="col-md-4">
                                <address class="text-center">
                                    ul. Edwarda Wittiga 6 <br />
                                    Dom Studencki T-15 <br />
                                    51-628 Wrocław <br />
                                </address>
                            </div>
                            <div class="col-md-8">
                                <b-form @submit.prevent="validateBeforeSubmit()" >
                                    <b-form-group id="exampleInputGroup1"
                                                  label="Adres email:"
                                                  label-for="exampleInput1"
                                                  description="Potrzebujemy twojego adresu email, żeby się z tobą skontaktować"
                                                  >
                                        <b-form-input id="exampleInput1"
                                                      type="email"
                                                      v-model="contactForm.email"
                                                      name="email"
                                                      placeholder="Enter email"
                                                      v-validate="'required|email'"
                                                      :class="{'is-invalid': errors.has('email') }">
                                        </b-form-input>
                                        <b-form-invalid-feedback>{{errors.first('email')}}</b-form-invalid-feedback>
                                    </b-form-group>
                                    <b-form-group id="exampleInputGroup2"
                                                  label="Imię i nazwisko:"
                                                  label-for="exampleInput2">
                                        <b-form-input id="exampleInput2"
                                                      type="text"
                                                      v-model="contactForm.name"
                                                      name="name"
                                                      v-validate="'require'"
                                                      placeholder="Wpisz swoje imię i nazwisko"
                                                      :class="{'is-invalid': errors.has('name') }">
                                        </b-form-input>
                                    </b-form-group>
                                    <b-form-group id="exampleInputGroup3"
                                                  label="Numer telefonu:"
                                                  label-for="exampleInput2">
                                        <b-form-input id="exampleInput2"
                                                      type="text"
                                                      v-model="contactForm.phone"
                                                      v-validate="'require'"
                                                      name="phone"
                                                      placeholder="Wpisz swój numer telefonu"
                                                      :class="{'is-invalid': errors.has('phone') }">
                                        </b-form-input>
                                    </b-form-group>
                                    <b-form-group id="exampleInputGroup4"
                                                  label="Wiadomość:"
                                                  label-for="message">

                                        <b-form-textarea id="message"
                                                         v-model="contactForm.message"
                                                         placeholder="Napisz w jakiej sprawie chcesz się z nami skontaktować"
                                                         name="message"
                                                         :rows="3"
                                                         :max-rows="6"
                                                         v-validate="'require'"></b-form-textarea>
                                    </b-form-group>
                                    <b-button type="submit" variant="primary">Wyślij</b-button>
                                </b-form>
                            </div>
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
                        <div class="row mr-1 text-justify justify-content-center">
                            <div class="col-3">
                                <avatar
                                        name="Krzysztof Trybuszewski"
                                        memberType="Prezes"
                                        avatar-img="https://scontent.fpoz1-1.fna.fbcdn.net/v/t1.0-9/41499478_1394415154028911_1216649563624964096_n.jpg?_nc_cat=0&oh=08cd631dacff62bc23e1cd414c4073a2&oe=5C36A8B6"
                                        phone="507663376"
                                        email="k.trybuszewski@gmail.com">

                                </avatar>

                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-3 col-12">
                                <avatar
                                        name="Kewin Gałuszka"
                                        memberType="Wiceprezes"
                                        avatar-img="https://scontent.fwaw3-1.fna.fbcdn.net/v/t1.0-9/29512965_1811477688922722_2049135657625410550_n.jpg?_nc_cat=0&oh=896e186689551adb8020a4ae30039ea3&oe=5C5E26DC"
                                        phone="530913009"
                                        email="kewin.galuszka@gmail.com">

                                </avatar>

                            </div>
                            <div class="col-md-3 col-12">
                                <avatar
                                        name="Daria Jaworska"
                                        memberType="Skarbnik"
                                        avatar-img="https://scontent.fwaw3-1.fna.fbcdn.net/v/t1.0-1/31363237_1646117462132562_5530777129639215104_n.jpg?_nc_cat=0&oh=a2ba70a21cd02846dcb581376023b41f&oe=5C5D3374"
                                        phone=""
                                        email="">

                                </avatar>

                            </div>
                            <div class="col-md-3 col-12">
                                <avatar
                                        name="Jakub Grzybek"
                                        memberType="ds. Klubu"
                                        avatar-img="https://scontent.fwaw3-1.fna.fbcdn.net/v/t1.0-9/29594885_1665039356921470_2588230364635524435_n.jpg?_nc_cat=0&oh=cafd302dfba18b81644f7e5b95948131&oe=5C1B7F3C"
                                        phone=""
                                        email="">

                                </avatar>

                            </div>
                            <div class="col-md-3 col-12">
                                <avatar
                                        name="Sandra Mrzygłód"
                                        memberType="ds. Promocji"
                                        avatar-img="https://scontent.fwaw3-1.fna.fbcdn.net/v/t1.0-9/32678486_422018788260970_534810766511964160_n.jpg?_nc_cat=0&oh=80e1356be116829e3a8fbfd67cf4e2c3&oe=5C5D7A0D"
                                        phone=""
                                        email="">

                                </avatar>

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
                        <h1 class="text-uppercase pb-2">DJE</h1>
                        <div class="row mr-1 text-justify justify-content-center">
                            <div class="col-3 ">
                                <avatar
                                  name="DJ Kamz"
                                  memberType="Przewdoniczący sekcji DJ-skiej"
                                  avatar-img="https://scontent.fpoz1-1.fna.fbcdn.net/v/t1.0-9/19657282_1363116423796026_1587300144022569518_n.jpg?_nc_cat=0&oh=04bc4935cfb044d84002812fcd9b1cf1&oe=5C277DD8"
                                  phone="668751336"
                                  email="kamzil2@gmail.com">
                                    <social-link type="facebook" href="https://www.facebook.com/kamzdj/" />
                                </avatar>
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
                        <div class="row mr-1 text-justify justify-content-center">
                            <div class="col-3 ">
                                <avatar
                                        name="Julia Musiał"
                                        avatar-img="https://thumbs.dreamstime.com/b/braka-placeholder-profilu-ikona-90197997.jpg"
                                        phone="775125856"
                                        email=""
                                />
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import MapHeader from '../page-part/HeaderMap'
import Avatar from '../page-part/Avatar/Avatar'
import SocialLink from "../page-part/Avatar/SocialLink";
import VeeValidate from "vee-validate";

export default {
  name: "contact",
  components: {
    SocialLink,
    MapHeader,
    Avatar,
    VeeValidate
  },
  data() {
    return {
      contactForm: {
        nameAndSurname: '',
        email: '',
        phone: '',
        message: ''
      }
    }
  },
  methods: {
    validateBeforeSubmit: () => {
      this.$validator.validateAll().then((result) => {
        if (result) {
          // eslint-disable-next-line
          return;
        }
      });
    }
    },
  mounted: () => {
    this.$validator.localize('PL');
  }
}
</script>

<style scoped>

</style>