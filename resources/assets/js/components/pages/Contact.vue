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
                                                  description="Potrzebujemy Twojego adresu email, żeby się z Tobą skontaktować"
                                                  >
                                        <b-form-input id="exampleInput1"
                                                      type="email"
                                                      v-model="contactForm.email"
                                                      name="email"
                                                      placeholder="Wpisz adres email"
                                                      v-validate="'required|email'"
                                                      :class="{'is-invalid': errors.has('email') }">
                                        </b-form-input>
                                        <b-form-invalid-feedback>{{errors.first('email')}}</b-form-invalid-feedback>
                                    </b-form-group>
                                    <b-form-group id="exampleInputGroup2"
                                                  label="Imię i nazwisko:"
                                                  label-for="exampleInput2"
                                                  description="Chcemy wiedzieć, kto do nas pisze">
                                        <b-form-input id="exampleInput2"
                                                      type="text"
                                                      v-model="contactForm.nameAndSurname"
                                                      name="name"
                                                      v-validate="'required|min:5'"
                                                      placeholder="Wpisz swoje imię i nazwisko *"
                                                      :class="{'is-invalid': errors.has('name') }">
                                        </b-form-input>
                                        <b-form-invalid-feedback>{{errors.first('name')}}</b-form-invalid-feedback>
                                    </b-form-group>
                                    <b-form-group id="exampleInputGroup3"
                                                  label="Numer telefonu:"
                                                  label-for="exampleInput2"
                                                  description="Jeśli chcesz, żebyśmy oddzwonili">
                                        <b-form-input id="exampleInput2"
                                                      type="text"
                                                      v-model="contactForm.phone"
                                                      v-validate="'required|phoneNumber'"
                                                      name="phone"
                                                      placeholder="Wpisz swój numer telefonu zaczynający się od +48"
                                                      :class="{'is-invalid': errors.has('phone') }">
                                        </b-form-input>
                                        <b-form-invalid-feedback>{{errors.first('phone')}}</b-form-invalid-feedback>
                                    </b-form-group>
                                    <b-form-group id="exampleInputGroup4"
                                                  label="Wiadomość:"
                                                  label-for="message"
                                                    :description="errors.first('message')">

                                        <b-form-textarea id="message"
                                                         v-model.trim="contactForm.message"
                                                         placeholder="Napisz w jakiej sprawie chcesz się z nami skontaktować"
                                                         name="message"
                                                         :rows="4"
                                                         :max-rows="6"
                                                         v-validate="'required|min:25'"
                                                         :state="!errors.has('message')"
                                                         :aria-invalid="errors.first('message')"></b-form-textarea>
                                    </b-form-group>
                                    <b-button type="submit" variant="primary" :disabled="errors.any() || isSending">Wyślij <span v-show="isSending"><i class="fa fa-spinner fa-spin"></i></span></b-button>
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
                                        avatar-img="../img/avatars/Krzysiek.jpg"
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
                                        name="Daria Jaworowska"
                                        memberType="Skarbnik"
                                        avatar-img="../img/avatars/Daria.jpg"
                                        phone="726115611"
                                        email="jaworowskadaria@gmail.com">

                                </avatar>

                            </div>
                            <div class="col-md-3 col-12">
                                <avatar
                                        name="Jakub Grzybek"
                                        memberType="ds. Klubu"
                                        avatar-img="../img/avatars/grzybek.jpg"
                                        phone="660358343"
                                        email="kuba.grzybek@gmail.com">

                                </avatar>

                            </div>
                            <div class="col-md-3 col-12">
                                <avatar
                                        name="Sandra Mrzygłód"
                                        memberType="ds. Promocji"
                                        avatar-img="../img/avatars/sandra.jpg"
                                        phone="669228089"
                                        email="sandra.mrzyglod.564@gmail.com">

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
                        <div class="row mr-1 text-justify justify-content-left">
                            <div class="col-3 ">
                                <avatar
                                  name="DJ Kamz"
                                  memberType="Przewdoniczący sekcji DJ-skiej"
                                  avatar-img="../img/avatars/kamil.jpg"
                                  phone="668751336"
                                  email="kamzil2@gmail.com">
                                    <social-link type="facebook" href="https://www.facebook.com/kamzdj/" />
                                    <social-link type="instagram" href="https://www.instagram.com/djkamz/" />
                                    <social-link type="spotify" href="https://open.spotify.com/artist/4OpowxAJqCRvswnbe9af1m?si=4EWYhiHaQjetgbujj6FOyw" />
                                    <social-link type="mixclude" href="https://www.mixcloud.com/potentialdifference/" />
                                    <social-link type="youtube" href="https://www.youtube.com/channel/UCvLSoIwN5iUh25cL92ctPlw" />
                                </avatar>
                            </div>
                            <div class="col-3 ">
                                <avatar
                                        name="DJ Criss"
                                        avatar-img="../img/avatars/Krzysiek.jpg"
                                        phone="507663376"
                                        email="k.trybuszewski@gmail.com">
                                    <social-link type="facebook" href="https://www.facebook.com/DJ.CR1SS" />
                                </avatar>
                            </div>
                            <div class="col-3 ">
                                <avatar
                                        name="DJ MichaelUp"
                                        avatar-img="../img/avatars/Pato.jpg"
                                        phone=""
                                        email="">
                                    <social-link type="facebook" href="https://www.facebook.com/michaelupbeats" />
                                    <social-link type="instagram" href="https://www.instagram.com/michaelupx01" />

                                </avatar>
                            </div>
                            <div class="col-3 ">
                                <avatar
                                        name="DJ Chmielu"
                                        avatar-img="../img/avatars/Chmielu.jpg"
                                        phone="663259689"
                                        email="dav.chmiel@gmail.com">
                                    <social-link type="facebook" href="../img/djchmielu.jpg" />
                                </avatar>
                            </div>
                            <div class="col-3 ">
                                <avatar
                                        name="Dj Rykon"
                                        avatar-img="../img/avatars/Ruszczyk.jpg"
                                        email="mar.ruszczyk@gmail.com"
                                phone="503461713">

                                </avatar>

                            </div>
                            <div class="col-3 ">
                                <avatar
                                        name="Dj Macko"
                                        avatar-img="../img/avatars/maciek.jpg"
                                        email="mar.ruszczyk@gmail.com"
                                        phone="503461713">

                                </avatar>

                            </div>
                            <div class="col-3 ">
                                <avatar
                                        name="Dj Bodzio"
                                        avatar-img="../img/avatars/bodzio.jpg">

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
                        <div class="row mr-1 text-justify justify-content-left">
                            <div class="col-3 ">
                                <avatar
                                        name="Julia Musiał"
                                        avatar-img="https://thumbs.dreamstime.com/b/braka-placeholder-profilu-ikona-90197997.jpg"
                                        phone="775125856"
                                        email=""
                                />
                            </div>
                            <div class="col-3 ">
                                <avatar
                                        name="Wojtek Obuchowski"
                                        avatar-img="../img/avatars/Wojteko.jpg"
                                        phone=""
                                        email="">
                                    <social-link type="facebook" href="https://www.facebook.com/W.Obuchowski1FOTO"></social-link>
                                </avatar>

                            </div>
                            <div class="col-3 ">
                                <avatar
                                        name="Kamil Żmijowski"
                                        avatar-img="../img/avatars/kamil.jpg"
                                        phone=""
                                        email="">
                                    <social-link type="facebook" href="https://www.facebook.com/kzmijowski"></social-link>
                                </avatar>

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
import { Validator } from 'vee-validate';
import PhoneNumber from '../util/validator/Custom-rules/PhoneNumber'
import {HTTP} from "../../http-comon";

const dictionary = {
  pl: {
    attributes: {
      email: 'adres email',
      name: 'imię i nazwisko',
      phone: 'numer telefonu',
      message: 'wiadomość'
    }
  }
};

export default {
  name: "contact",
  components: {
    SocialLink,
    MapHeader,
    Avatar
  },
  data() {
    return {
      contactForm: {
        nameAndSurname: '',
        email: '',
        phone: '',
        message: ''
      },
      isSending: false
    }
  },
  methods: {
    validateBeforeSubmit: function () {
      this.$validator.validateAll().then(result => {
        if (result) {
          this.isSending = true
          HTTP.post('/contact', this.contactForm)
            .then(request => {
              this.isSending = false
              this.contactForm = {
                nameAndSurname: '',
                email: '',
                phone: '',
                message: ''
              }
              this.$validator.reset()
              this.$swal("Sukces", request.data.message, 'success')

            }).catch(error => {
            console.log(error)
            console.log(error.request)
            switch (error.request.status) {
              case 429:
                this.$swal('Zbyt dużo prób!','Możesz wysłać tylko jedną wiadomość na 10 minut. Jeśli już musisz poczekaj 10 minut i spróbuj ponownie ','warning')
                break

              default:
                this.$swal(error.request.message)
                break
            }
            this.isSending = false

          })
        }
      });
    }
  },
  beforeCreate () {
    Validator.localize(dictionary);
  }
}
</script>

<style scoped>

</style>