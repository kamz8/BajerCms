<template>
    <div class="form-control d-flex flex-row">
        <div class="flex-column">
            <datepicker v-model="start_date" :language="config.language" :format="customFormatter" input-class="dateinput flex-items-middle"></datepicker>
        </div>
        <div class="flex-column">
            <select class="hour-select" v-model="hour_start">
                <option v-for="i in (0, 24)">{{i-1}}:00</option>
            </select>
        </div>

        <div class="flex-column"><span class="separator flex-items-middle">-</span></div>
        <div class="flex-column">
            <datepicker v-model="end_date" :language="config.language" :format="customFormatter" input-class="dateinput"></datepicker>

        </div>
        <div class="flex-column">
            <select class="hour-select flex-items-middle" v-model="hour_end">
                <option v-for="i in (0, 24)" :disabled="ifHourBefore(i)">{{i-1}}:00</option>
            </select>
        </div>

    </div>
</template>

<script>
  import moment from "moment";
  import Datepicker from 'vuejs-datepicker';
  import {pl} from 'vuejs-datepicker/dist/locale'
  export default {
    name: "daterange",
    props: ['modalShow'],
    components:{
      Datepicker,
    },
    props: {
      value: {}
    },
    data() {
      return {
        hour_start: '',
        hour_end: '',
        end_date: null,
        start_date: null,
        config: {
          language: pl,
          // https://momentjs.com/docs/#/displaying/
          useCurrent: false,
        }
      }
    },
    methods: {
      getCurrentHour() {
        return moment().hour().toString() + ':00'
      },
      ifHourBefore(hour){
        return moment().isBefore(hour+':00', 'hour')
      },
      updateRenge() {
        let startDate = moment(this.start_date).format('YYYY-MM-DD') + ' ' + this.hour_start+':00'
        let endDate = moment(this.end_date).format('YYYY-MM-DD') + ' ' + this.hour_end+':00'
        this.$emit('input',{
          startDate: startDate,
          endDate: endDate
        })
      },
      customFormatter(date) {
        return moment(date).format('Do MMMM YYYY');
      }
    },
    mounted () {
      this.start_date = new Date()
      this.end_date = new Date()
      this.hour_start = this.getCurrentHour()
      this.hour_end = moment().add(1,'hour').hour().toString() + ':00'
      },
    updated() {
      this.updateRenge()
    }
  }
</script>

<style>
    .dateinput{
        border: none;
        font-size: 14px;
        line-height: 1.5;
        background: transparent;
        width: auto;
        max-width: 100px;
        flex-grow: 1;
        flex-shrink: 1;

    }
</style>
<style scoped>

.hour-select{
    display: inline-flex;
    /*font-size: 14px;*/
    max-width: 100%;
    width: auto;
    margin: 0 auto;
    padding: 0;
    line-height: 1.5em;
    color: #495057;
    vertical-align: middle;
/*    background: transparent url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 4 5'%3E%3Cpath fill='%23333' d='M2 0L0 2h4zm0 5L0 3h4z'/%3E%3C/svg%3E") no-repeat right .75rem center;
    background-size: auto auto;
    background-size: 8px 10px;*/
    background: transparent;
    border: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
}
.form-control{
    height: 2.5rem;
}
    .separator{
        padding: 0px 5px;
    }
</style>