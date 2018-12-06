    <template>
        <div>
            <v-header scrollTo="#wynajmy" vtitle="Wynajmy" coverImg="https://scontent.fpoz1-1.fna.fbcdn.net/v/t31.0-8/22904747_1825851234094073_1217771858351134340_o.jpg?_nc_cat=0&oh=35e37c75eb8b174a994ae7d27a05d11a&oe=5C1C7A03"></v-header>
            <section id="wynajmy" class="content-box">
                <div class="container">
                    <div class="row">
                        <article class="col-md-12 text-center">
                            <h2 class="text-uppercase pb-2">Wynajmij salę na własne potrzeby</h2>
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
                    <div class="row">
                        <article class="col-md-12 text-center">
                            <h2 class="text-uppercase pb-2">Jak wynająć klub?</h2>
                            <div class="mr-1 text-justify">
                                <h5>Od czego rozpoczynamy wynajmy:</h5>
                                <ul>
                                    <li></li>
                                </ul>
                            </div>
                        </article>
                    </div>
                </div>
            </section>
            <section id="faq" class="content-box">
                <div class="container">
                    <div class="row">
                        <article class="col-md-12 text-center">
                            <h1 class="text-uppercase pb-2">Najczęściej zadawane pytania</h1>
                            <div class="mr-1 text-justify">
                                <dropdown-cart v-for="faq in faqs" :title="faq.question">
                                    {{faq.answer}}
                                </dropdown-cart>
                            </div>
                        </article>
                    </div>
                </div>
            </section>
        </div>
    </template>

<script>
  import vHeader from '../page-part/Header'
  import DropdownCart from '../util/DropdownCart'
  export default {
    name: "booking",
    components: {
      DropdownCart,
      vHeader
    },
    data () {
      return {
        faqs: [
          {
            question: '',
            answer: ''
          },
          {
            question: '',
            answer: ''
          },
          {
            question: '',
            answer: ''
          },
          {
            question: '',
            answer: ''
          },
          {
            question: '',
            answer: ''
          }
        ]
      }
    }
  }
</script>

<style scoped>

</style>