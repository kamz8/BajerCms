<template>
  <div>
    <v-header
      scroll-to="#oferta"
      vtitle="Oferta klubu"
      cover-img="../img/oferta-cover.jpg"
    />
    <section
      id="oferta"
      class="content-box"
    >
      <div class="container">
        <div class="row">
          <article class="col-md-12 text-center">
            <h1 class="text-uppercase pb-2">
              Poznaj nas bliżej
            </h1>
            <div class="text-justify">
              <p>
                <!--treść strony-->
                Tutaj pojawi się treść dotycząca ścisłej oferty klubu, sugeruję jednak, żeby nie dublowała się z info, które mamy w sekcji O Klubie, bo będzie to
                niepotrzebne powtarzanie treści
              </p>
              <p>
                Przedstawiłem już (na slacku, na spotkaniu) wstępny zestaw informacji, który można tu zawrzeć, czyli: parametry naszej sali, opis używanego
                nagłośnienia, oświetlenia, wsparcie techniczne przy organizacji... czyli wiadomości bardziej konkretne niż piękny elaborat w sekcji O Klubie,
                który powinien informować potencjalnych najemców, co będą mieć do dyspozycji, gdy zdecydują się z nami współpracować. Eksponujemy nasze techniczne możliwości.
              </p>
              <p>
                Nie chcę pisać tego sam, bo po prostu nie mam odpowiedniej wiedzy, żeby samemu opracować taki tekst.
              </p>
              <p>
                ~Stachu
              </p>
            </div>
          </article>
        </div>
        <div class="row">
          <article class="col-md-12 text-center">
            <h2 class="text-uppercase pb-2">
              Dlaczego warto z nami współpracować?
            </h2>
            <div class="text-justify">
              <p>
                Klub Studencki Bajer funkcjonuje od 40 lat. Formuła naszej działalności ulegała zmianie, odkąd postawiliśmy pierwsze kroki w 1978 roku, jednak za każdym
                razem staraliśmy się działać coraz lepiej i nieustannie się rozwijać. Skupiliśmy się na atrakcyjnych imprezach
                i innych aktywnościach (np. występy kabaretowe, grille akademickie, koncerty). W takiej formie funkcjonujemy do dziś.
              </p>
              <p>
                Długoletnia działalność i różnorodność wydarzeń, w których dotychczas wzięliśmy udział, pozwoliły nam uzyskać doświadczenie,
                które umożliwia nam realizację nawet najbardziej nieprawdopodobnych zadań. Klub Studencki Bajer stał się rozpoznawalny w środowisku
                studenckim Wrocławia, a organizowane przez nas aktywności cieszą się niesłabnącą popularnością.
              </p>
              <p>
                Regularnie współpracujemy z Zarządem Parlamentu Studentów, Komisją ds. Kultury i wieloma innymi Organizacjami Studenckimi
                przy tworzeniu projektów dla środowiska akademickiego. Wspieraliśmy (i cały czas wspieramy) takie projekty, jak: Otrzęsiny PWr,
                I &lt;3 PWr, Juwenalia PWr, Obóz Studentów PWr i wiele innych wydarzeń, które gromadziły ponad 1000 osób.
              </p>
              Zaufali nam:
              <ul>
                <li>
                  JumpWorld
                </li>
                <li>
                  Szkoła Tańca "Fly Dance Academy"
                </li>
                <li>
                  Santander Universidades Polska
                </li>
                <li>
                  Rapid Events
                </li>
                <li>
                  Future Skills szkolenia biznesowe
                </li>
              </ul>

              <p>
                Jesteśmy grupą aktywnych ludzi, którzy myślą poza wszelkimi schematami i nie boją się żadnych wyzwań. Zapraszamy do kontaktu!
              </p>
            </div>
          </article>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import vHeader from '../page-part/Header';

export default {
  name: 'Offer',
  components: {
    vHeader,
  },
};
</script>

<style scoped>

</style>
