<template>
  <div>
    <footer class="footer">
      <h2 class="text-uppercase text-center p-2">
        śledź nas
      </h2>
      <div class="container h-100">
        <div class="row align-items-center h-100">
          <div class="col-12 col-md-3">
            <img
              class="img-fluid mx-auto w-50 d-block"
              src="img/bajer.png"
            >
            <address class="text-center">
              ul. Edwarda Wittiga 6 <br>
              Akademik T-15 <br>
              51-628 Wrocław <br>
            </address>
          </div>
          <div class="col-12 col-md-6">
            <div class="social-icons text-center">
              <ul class="social-network social-circle text-dark">
                <li>
                  <a
                    href="https://www.facebook.com/Klub.Studencki.Bajer/"
                    class="Facebook"
                    title="Facebook"
                    target="_blank"
                  ><i class="fa fa-facebook" /></a>
                </li>
                <li>
                  <a
                    href="https://www.instagram.com/klub.studencki.bajer/"
                    class="Instagram"
                    title="Instagram"
                    target="_blank"
                  ><i class="fa fa-instagram" /></a>
                </li>
                <li>
                  <a
                    href="https://www.snapchat.com/add/ksbajer"
                    class="Snapchat"
                    title="Snapchat"
                    target="_blank"
                  ><i class="fa fa-snapchat-ghost" /></a>
                </li>
                <li>
                  <a
                    href="https://open.spotify.com/user/klubstudenckibajer?si=ri5LY5koQrKIG5bkSbEi1w"
                    class="Spotify"
                    title="Spotify"
                    target="_blank"
                  ><i class="fa fa-spotify" /></a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-12 col-md-3">
            <router-link
              :to="{name: 'contact'}"
              class="btn btn-light text-uppercase text-dark btn-block mt-5 mt-md-0"
            >
              kontakt
            </router-link>
          </div>
        </div>
      </div>
    </footer>
    <div class="subfooter text-center text-md-right">
      <div class="container">
        <span>&copy; Bajer 2018 | Created by Kamil Żmijowski & Stanisław Markowski</span>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'MainFooter',
};
</script>

<style scoped>

</style>
