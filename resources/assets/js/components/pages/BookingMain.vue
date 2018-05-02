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
  import {HTTP} from "../../http-comon";

  export default {
    name: "booking-main",
    components: {
      VueCalender,
      MainFooter,
      Navbar,
    },
    data() {
      return {
        events: []
      }
    },
    methods: {
      fetchEvents: function() {
        HTTP.get('/events?start_date=2018-03-01&end_date=2018-05-30')
          .then(response => {
            this.events = response.data
          })
          .catch(error => {
            console.log(error)
          })
      },
    },
    created() {
      this.fetchEvents()
    }

  }
</script>
<style scoped>
    .page-cover {
        position: absolute;
        min-width: 100%;
        min-height: 100%;
        background: url('../../../../../public/img/IMG_4630.jpg') 100% no-repeat;
        background-attachment: fixed;
        background-size: cover;
    }

</style>