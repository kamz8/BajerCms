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
                                  Klub można wynająć na wydarzenia takie jak: imprezy okolicznościowe, uroczystości obchodzone przez Organizatora, koncerty, szkolenia, konferencje, warsztaty tematyczne, wykłady lub inne tego typu spotkania.
                                  Informujemy Was również, że osoba prywatna wyrażająca chęć wynajmu sali musi mieć powiązanie z Politechniką Wrocławską (posiadanie aktualnego statusu studenta, pracownika).
                                  Koszt wynajmu jest uzależniony od terminu planowanego wydarzenia.
                                  Zachęcamy do zapoznania się z regulaminem wynajmów oraz kontaktu z Nami.
                                </p>
                                <p>
                                  Regulamin dostępny jest pod <a target="_blank" href="https://docs.google.com/document/d/1Kn7G-8tydq43uHcNM6DMBS3R__o7-RAxQUJTfRsE2Qk/edit?usp=sharing">tym linkiem</a>.
                                </p>
                            </div>
                        </article>
                    </div>
                    <div class="row">
                        <article class="col-md-12 text-center">
                            <h2 class="text-uppercase pb-2">Jak wynająć klub?</h2>
                            <div class="mr-1 text-justify">
                                <h5>Od czego rozpoczynamy wynajmy:</h5>
                                <ul>
                                    <li>minimum 5 tygodni przed planowanym wydarzeniem należy zgłosić się do przedstawicieli Klubu w celu dokonania rezerwacji</li>
                                    <li>
                                      minimum 30 dni przed planowanym wydarzeniem należy złożyć w Dziale BHP wniosek o wydarzenie uprzednio sporządzony z pomocą przedstawiciela Klubu
                                    </li>
                                    <li>
                                      minimum 30 dni przed planowanym wydarzeniem należy złożyć wniosek o zgodę do Zarządu Klub Studenckiego Bajer, Kierownika Domu Studenckiego T-15 oraz Dyrektora Działu Domów Studenckich
                                    </li>
                                    <li>
                                      minimum 20 dni przed planowanym wydarzeniem należy podpisać umowę wynajmu
                                    </li>
                                    <li>
                                      nie później niż dwa tygodnie przed planowanym wydarzeniem należy dostarczyć szczegółowe informacje dotyczące wydarzenia, a także wytyczne odnośnie zapotrzebowań od strony technicznej
                                    </li>
                                    <li>
                                      minimum 14 dni przed planowanym wydarzeniem należy dokonać opłaty za wynajem według uwag zawartych w umowie
                                    </li>
                                    <li>
                                      minimum 7 dni przed planowanym wydarzeniem należy dostarczyć listę gości
                                    </li>
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
                                <dropdown-cart v-for="faq in faqs" :key="faq.question" :title="faq.question">
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
            question: 'Ile maksymalnie osób może uczestniczyć w moim wydarzeniu?',
            answer: 'W sali tanecznej Klubu Studenckiego Bajer zgodnie z zasadami BHP może uczestniczyć maksymalnie 100 osób.'
          },
          {
            question: 'Ile kosztuje wynajem sali?',
            answer: 'Wydarzenie (imprezy okolicznościowe, uroczystości obchodzone przez Organizatora, koncerty) w piątek, sobotę w godzinach 19:00-01:00 - 400 złotych. Wydarzenie (imprezy okolicznościowe, uroczystości obchodzone przez Organizatora, koncerty) od poniedziałku do czwartku w godzinach 18:00-22:00 - 300 złotych. Wydarzenie (szkolenia, konferencje, warsztaty tematyczne, wykłady lub inne tego typu spotkania) - 50 złotych/godzinę.'
          },
          {
            question: 'Czy muszę być studentem Politechniki Wrocławskiej, żeby wynająć salę?',
            answer: 'Według regulaminu osoba prywatna ubiegająca się o udostępnienie Sali Tanecznej KS Bajer musi mieć powiązanie z Politechniką Wrocławską (posiadanie aktualnego statusu studenta, pracownika).'
          },
          {
            question: 'Kiedy najpóźniej muszę zgłosić do Was chęć wynajęcia sali?',
            answer: 'Rezerwacji należy dokonać co najmniej 5 tygodni przed planowaną datą wydarzenia.'
          },
          {
            question: 'Czy zostanie mi udostępniony sprzęt nagłośnieniowy i oświetleniowy znajdujący się w Klubie?',
            answer: 'Tak, jeżeli wcześniej te kwestie zostaną omówione z przedstawicielem Klubu Studenckiego Bajer. '
          },
          {
            question: 'Co leży w obowiązkach wynajmującego salę?',
            answer: 'Osoba prywatna wyrażająca chęć wynajmu sali jest zobowiązana do wypełnienia wszystkich formalności zgodnie z zaleceniami przedstawiciela Klubu Studenckiego Bajer oraz przestrzegania regulaminu udostępniania oraz użytkowania sali tanecznej Klubu Studenckiego Bajer.'
          },
          {
            question: 'Czy istnieje możliwość, żeby pojawiać się wcześniej w Klubie, żeby przygotować wszystko do wydarzenia?',
            answer: 'Sala otwierana jest w godzinie rozpoczęcia Wynajmu określonej umową.'
          },
          {
            question: 'Wydarzenia o jakim charakterze można zorganizować w Klubie?',
            answer: 'Jest możliwość wynajęcia sali Klubu na wydarzenia takie jak: imprezy okolicznościowe, uroczystości obchodzone przez Organizatora, koncerty, szkolenia, konferencje, warsztaty tematyczne, wykłady lub inne tego typu spotkania.'
          }
        ]
      }
    }
  }
</script>

<style scoped>

</style>
