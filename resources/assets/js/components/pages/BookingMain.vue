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
                        <vue-calender :events="events" locale="pl"
                                      @nextMonth="updateCalenar(currentDate.add(1, 'months'))"
                                      @prevMonth="updateCalenar(currentDate.subtract(1, 'months'))"
                                      @notAuth="loginAlert = true"></vue-calender>
                    </div>
                </div>
            </div>
        </article>
        <b-alert :show="loginAlert" @dismissed="loginAlert=false" class="popup" dismissible  variant="warning">
            <p>
                Aby dodać rezerwację musisz być zalogowany! <b-link :to="{name: 'login'}">zaloguj</b-link>
            </p>
        </b-alert>
    </div>
</template>

<script>
  import Navbar from "../page-part/Navbar";
  import MainFooter from "../page-part/MainFooter";
  import VueCalender from "../calender/VCalender";
  import VueBootstrap from "bootstrap-vue"
  import {HTTP} from "../../http-comon";
  import moment from 'moment'
  export default {
    name: "booking-main",
    components: {
      VueCalender,
      MainFooter,
      Navbar,
    },
    data() {
      return {
        events: [],
        currentDate: moment(),
        loginAlert: false
      }
    },
    methods: {
        updateCalenar(newDate) {
          this.currentDate = newDate
        }
    },
    computed: {
      fetchEvents: function() {
        let start_date = moment(this.currentDate).subtract(2, 'months').format('YYYY-MM-DD')
        let end_date = moment(this.currentDate).add(2, 'months').format('YYYY-MM-DD')
        HTTP.get(`/events?start_date=${start_date}&end_date=${end_date}`)
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
.popup{
    position: absolute;
    top: 50px;
    right: 25px;
}
    .popup > p {
        padding-right: 1em
    }
</style>