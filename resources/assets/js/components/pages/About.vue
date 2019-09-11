<template>
  <div>
    <v-header scrollTo="#onas" vtitle="O Klubie" coverImg="./img/bg_oklubie.jpg"></v-header>
    <section id="onas" class="content-box">
      <div class="container">
        <div class="row">
          <article class="col-md-12 text-center">
            <h1 class="text-uppercase pb-2">O klubie</h1>
            <p>
              Jesteśmy <strong>agendą kultury</strong>, która zajmuje się organizacją imprez tanecznych, koncertów,
              aktywności sportowych oraz innych inicjatyw kulturalno-rozrywkowych dla studentów. Ponadto bardzo
              aktywnie współpracujemy z innymi organizacjami zapewniając na wydarzeniach oprawę muzyczną i zaplecze
              techniczne. Jeżeli idąc przez kampus uczelni słyszycie muzykę, widzicie tańczących ludzi tam na pewno
              nas spotkacie.
            </p>
            <p>
              W 2018 roku Klub Studencki Bajer świętował <strong> jubileusz 40-lecia </strong> działalności przy
              Politechnice Wrocławskiej. Jako jedna z nielicznych organizacji działających przy Politechnice możemy
              się pochwalić tak długą tradycją funkcjonowania.
            </p>
          </article>
        </div>
        <div class="text-center">
            <p>
              <carousel v-bind:photos="carouselPhotos[0]" v-bind:interval="5000"></carousel>
            </p>
        </div>
        <div class="row">
          <article class="col-md-12 text-center">
            <p>
              Wydarzenia odbywają się w siedzibie naszego klubu, w <strong> Domu Studenckim T-15 </strong>na osiedlu
              akademickim Wittigowo.
              Również ze względu na stale rosnące zainteresowanie coraz częściej organizowane działalności przenosimy
              poza mury akademika,
              w miejsca, gdzie możemy zaprosić jeszcze więcej studentów.
              Zapraszamy do stałego śledzenia naszych mediów społecznościowych, zamieszczamy tam wszystkie informacje
              na temat planowanych inicjatyw.
            </p>
            <div class="social-icons text-center mt-3 mb-3">
              <ul class="social-network social-circle text-dark">
                <li class="mb-2"><a href="https://www.facebook.com/Klub.Studencki.Bajer/" class="Facebook"
                                    title="Facebook"
                                    target="_blank"><i class="fa fa-facebook"></i></a></li>
                <li><a href="https://www.instagram.com/klub.studencki.bajer/" class="Instagram" title="Instagram"
                       target="_blank"><i class="fa fa-instagram"></i></a></li>
                <li><a href="https://www.snapchat.com/add/ksbajer" class="Snapchat" title="Snapchat"
                       target="_blank"><i class="fa fa-snapchat-ghost"></i></a></li>
                <li><a href="https://open.spotify.com/user/klubstudenckibajer?si=ri5LY5koQrKIG5bkSbEi1w"
                       class="Spotify" title="Spotify" target="_blank"><i class="fa fa-spotify"></i></a></li>
              </ul>
            </div>
            <p>
              Początki działalności klubowej sięgają 1978 roku. Na przestrzeni tych 40-lat Bajer zmieniał swoją nazwę
              oraz formułę działalności. W czasach, kiedy nie było jeszcze komercyjnych klubów, Wittigowo stanowiło
              centrum rozrywki wrocławskich studentów. Wiedza o początkach działalności Bajeru ginie w mrokach
              przeszłości, najpewniej jednak swoją historię zapoczątkował on jako Klub Abstynenta.
            </p>
          </article>
        </div>
        <div class="row">
          <div class="col-sm mb-3"><img alt="Archiwalne zdjęcie" :src="'./img/archived/1.jpg'" class="img-fluid"/></div>
          <div class="col-sm mb-3"><img alt="Archiwalne zdjęcie" :src="'./img/archived/2.jpg'" class="img-fluid"/></div>
          <div class="col-sm mb-3"><img alt="Archiwalne zdjęcie" :src="'./img/archived/3.jpg'" class="img-fluid"/></div>
        </div>
        <div class="row">
          <article class="col-md-12 text-center">
            <p>
              Następnie Bajer zasłynął jako miejsce, w którym
              odbywały się przeglądy kabaretów, spektakle teatralne, festiwale muzyczne, projekcje filmowe,
              zajęcia taneczne, koncerty, swoje pierwsze kroki na scenie Naszego Klubu stawiała dziennikarka
              Ewa Drzyzga, wielokrotnie odbywały się występy najsłynniejszego wrocławskiego kabaretu Elita,
              który zaczynał swoją działalność przy Politechnice Wrocławskiej. Ostatnia dekada to głównie
              imprezy taneczne oraz przeglądy muzyczne, koncerty, które cieszą się stale rosnącym
              zainteresowaniem studentów.
            </p>
          </article>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
  import vHeader from '../page-part/Header'
  import Carousel from '../page-part/Carousel'

  export default {
    name: "about",
    components: {
      vHeader,
      Carousel
    },
    data: function () {
      return {
        carouselPhotos: [
          [
            {
              src: './img/about-us-carousels/bajeroland-2018.jpg',
              text: 'Festiwal kolorów, Bajeroland 2018'
            },
            {
              src: './img/about-us-carousels/oboz-2018-2.jpg',
              text: 'Tańce integracyjne, Obóz Studentów PWr 2018'
            },
            {
              src: './img/about-us-carousels/pijama-party-2016.jpg',
              text: 'Bitwa na poduszki, Pijama Party 2016'
            },
            {
              src: './img/about-us-carousels/chillout-z-santanderem-2017.jpg',
              text: 'Wsparcie muzyczne i animacje, Chillout z Santanderem 2017'
            },
            {
              src: './img/about-us-carousels/letni-chamski-podryw-2016.jpg',
              text: 'Koncert Letniego Chamskiego Podrywu 2016'
            },
            {
              src: './img/about-us-carousels/bajeroland-2019.jpg',
              text: 'Scena główna, Bajeroland 2019'
            },
            {
              src: './img/about-us-carousels/lanserki-2018.jpg',
              text: 'Zdjęcie promujące Andrzejki Lanserki 2018'
            },
            {
              src: './img/about-us-carousels/oboz-2018.jpg',
              text: 'Warsztaty DJskie, Obóz Studentów PWr 2018'
            },
            {
              src: './img/about-us-carousels/DAS-2018-jesien.jpg',
              text: 'Tańce integracyjne, Dni Aktywności Studenckiej 2018'
            },
            {
              src: './img/about-us-carousels/cztery-wesela-i-bajer-2018.jpg',
              text: 'Impreza w Strefie Kultury Studenckiej, Cztery Wesela i Bajer 2018'
            },
            {
              src: './img/about-us-carousels/chlopaki-z-natury-2018.jpg',
              text: 'Koncert Chłopaków z Natury 2018'
            },
            {
              src: './img/about-us-carousels/lanserki-2017.jpg',
              text: 'Andrzejki Lanserki 2017'
            }
          ]
        ]
      }
    }
  }
</script>

<style scoped>

</style>
