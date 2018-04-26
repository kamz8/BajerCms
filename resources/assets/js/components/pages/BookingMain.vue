<!--suppress ALL -->
<template>
    <div class="page-cover overlay">
        <navbar></navbar>
        <article>
            <div class="container">
                <div class="row">
                    <div class="col-12 mx-auto pt-4 pb-3">
                        <h1 class="text-center">Zarezerwuj Salę</h1>
                    </div>

                </div>
                <div class="row">
                    <div class="col-12 mx-auto pt-4 pb-3">
                        <vue-calender :events="events" locale="pl"></vue-calender>
                    </div>
                </div>
            </div>
        </article>

    </div>
</template>

<script>
  import Navbar from "../page-part/Navbar";
  import MainFooter from "../page-part/MainFooter";
  import VueCalender from "../calender/VCalender";
  import VueBootstrap from "bootstrap-vue"
  export default {
    name: "booking-main",
    components: {
      VueCalender,
      MainFooter,
      Navbar,
      },
    data(){
      return{
        events: [
          {
            id: 31,
            title: 'Rezerwacja xyz',
            description: 'Odio est ipsam magnam nulla distinctio. Voluptatem ducimus saepe labore et a mollitia sunt.',
            start_date: '2018-04-21 08:00:00',
            end_date: '2018-04-21 15:00:00',
            accepted: 0
          },
          {
            id: 51,
            title: 'Rezerwacja xyz',
            description: 'Ut sed eligendi delectus unde quasi dignissimos accusamus. Sed aut rerum eum quibusdam cum esse.',
            start_date: '2018-04-11 19:00:00',
            end_date: '2018-04-12 02:00:00',
            accepted: 1
          },
          {
            id: 81,
            title: 'Rezerwacja xyz',
            description: 'Incidunt quas culpa dolor. Quos enim rerum et. Voluptatem est in quis qui reiciendis.',
            start_date: '2018-04-10 18:00:00',
            end_date: '2018-04-10 19:00:00',
            accepted: 1
          },
          {
            id: 81,
            title: 'Rezerwacja Jan Kowalski',
            description: 'Incidunt quas culpa dolor. Quos enim rerum et. Voluptatem est in quis qui reiciendis.',
            start_date: '2018-04-10 20:00:00',
            end_date: '2018-04-10 24:00:00',
            accepted: 0
          }
]
      }
    }
  }
</script>
<style scoped>
    .page-cover{
        position: absolute;
        min-width: 100%;
        min-height: 100%;
        background: url('../../../../../public/img/IMG_4630.jpg') 100% no-repeat;
        background-attachment: fixed;
        background-size: cover;
    }

</style>