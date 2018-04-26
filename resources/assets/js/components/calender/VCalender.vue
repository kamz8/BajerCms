<template>
    <div class="calender-main">
        <header class="calender-header">
            <div class="row">
                <div class="col-12 text-center">
                    <p class="mx-auto">
                        <i class="fa fa-arrow-left pr-4 prev-month" @click="prevMonth"></i>
                        <span class="text-capitalize">{{MonthName}}</span>
                        <i class="fa fa-arrow-right pl-4 next-month" @click="nextMonth"></i>
                    </p>

                </div>
            </div>
        </header>
        <div class="calender-body glass">
            <div class="weeks">
                <div class="vc-row">
                    <div class="vc-col week text-center " v-for="dayOfWeek in daysOfWeek"><p>{{dayOfWeek}}.</p></div>
                </div>
            </div>
            <div class="dates">
                <div class="vc-row events-week" v-for="week in currentDates">
                    <div class="vc-col day-cell" v-for="(day, i) in week"
                         :class="{'today' : day.isToday,
                         'not-cur-month' : !day.isCurMonth}">
                        <p class="day-number">{{day.monthDay}}</p>
                        <div class="event-box">
                            <p class="event-item" v-for="(event, n) in day.events"
                               :class="{
                  'bg-danger': !event.accepted,
                  'bg-info': event.accepted
                  }"
                               :v-click-outside="showMore = false"
                               @click="eventClick(event,$event)" :id="'event-'+event.id" >
                                {{formatTime(event.start_date)+" "+ event.title}}
                                <show-event :popoverTrigger="showMore" :event="event"
                                            :target="'event-'+event.id" />
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
  import moment from "moment"
  import ShowEvent from "./ShowEvent";
  import ClickOutside from 'vue-click-outside'

  export default {
    name: "vue-calender",
    components: {ShowEvent},
    // do not forget this section
    directives: {
      ClickOutside
    },
    props: {
      events: {
        default: []
      },
      locale: {
        default: 'pl'
      }
    },
    data() {
      return {
        monthName: '',
        daysOfWeek: null, // ['Pon.', 'Wt.', 'Śr.', 'Czw.', 'Pt.', 'Sob.', 'Niedz.'],
        isLismit: true,
        eventLimit: 3,
        selectedEvent: null,
        showMore: false,
        morePos: {
          top: 0,
          left: 0
        },
        selectDay: {},
        currentDate: moment.utc(moment(), "YYYY-MM-DD"),
      }
    },
    methods: {
      getCalendar() {
        // calculate 2d-array of each month
        // first day of this month
        let now = moment.utc(moment(), "YYYY-MM-DD") // today
        var current = moment(this.currentDate).utc()
        // return first day of this month
        let startDate = current.subtract(1, 'month').endOf('month').day("Monday")
        let endDate = moment(current).add(1, 'month').endOf('month').day(7)
        let curWeekDay = startDate.date()

        // begin date of this table may be some day of last month
        // startDate.setDate(startDate.getDate() - curWeekDay)

        let calendar = []
        let isFinal = false

        for (let perWeek = 0; perWeek < 6; perWeek++) {

          let week = []
          for (let perDay = 0; perDay < 7; perDay++) {
            week.push({
              monthDay: startDate.date(),
              isToday: now.format('YYYY MM DD') === startDate.format('YYYY MM DD'),
              isCurMonth: startDate.month() == this.currentDate.month(),
              weekDay: startDate.weekday(),
              date: startDate,
              events: this.slotEvents(startDate)
            })
            startDate.add(1, 'day')

          }

          calendar.push(week)
          if (startDate.isSameOrAfter(endDate)) break
        }
        return calendar
      },
      slotEvents(date) {
        return this.events.filter(event => {
          let startDate = moment(event.start_date)

          if (date.format('YYYY-MM-DD') === startDate.format('YYYY-MM-DD')) {
            return event
          }
        })
      },
      isStart(eventDate, date) {
        return eventDate.toString() === date.toString()
      },
      isEnd(eventDate, date) {
        let ed = new moment(eventDate)
        return ed.toString() === moment(date).toString()
      },
      nextMonth() {

        this.currentDate = moment.utc(this.currentDate, "YYYY-MM-DD").add(1, 'month')
      },

      prevMonth() {
        let current = this.currentDate.format()
        this.currentDate = moment.utc(this.currentDate, "YYYY-MM-DD").subtract(1, 'month')
      },
      eventClick(event) {
        this.$root.$emit('bv::hide::popover')
        this.selectedEvent = event
        this.showMore = !this.showMore
      },
      formatTime: function (time) {
        if (time) {
          return moment(time).format('HH:mm')
        }
        return ''
      }
    },
    computed: {
      currentDates() {
        return this.getCalendar()
      },

      /**
       * @return {string}
       */
      MonthName() {
        return moment(this.currentDate).format('MMMM YYYY');
      },

    },

    created() {
      moment.locale(this.locale)
      this.daysOfWeek = moment.weekdaysShort(true)
    },
    mounted() {
      this.popupItem = this.$el
    },

  }
</script>

<style lang="scss" scoped>
    .calender-main {
        position: relative;
    }

    .calender-body {
        min-width: 100%;
    }

    .vc-row {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        border-left: 1px solid #e0e0e0;
    }

    .vc-col {
        -ms-flex-preferred-size: 0;
        flex-basis: 0;
        -ms-flex-positive: 1;
        flex-grow: 1;
        max-width: 100%;
        margin: auto; /* Magic! */
    }

    .weeks {
        border-top: 1px #fff solid;
    }

    .week {
        border-right: 1px #fff solid;
        border-bottom: 1px #fff solid;
    }

    .week > p {
        margin: auto;
        line-height: 1.8em;
    }

    .dates {
        position: relative;
    }

    .day-cell {
        cursor: pointer;
        min-height: 109px;
        overflow: hidden;
        text-overflow: ellipsis;

        border-right: 1px solid #e0e0e0;
        border-bottom: 1px solid #e0e0e0;
        padding: 4px;

    }

    .today {
        .day-number {
            background-color: #007bff;
            border-radius: 100%;

            display: inline-block;
            width: 1.5em;
            line-height: 1.5em;
            text-align: center;
        }
    }

    .events-day:last-child {
        border-right: 1px #fff solid;
    }

    .glass {
        position: absolute;
        background: inherit;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.25);
        overflow: hidden;
    }

    .glass:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: inherit;
        filter: blur(10px) saturate(2);
    }

    .not-cur-month {
        color: rgba(130, 130, 130, 0.8);
    }

    .prev-month, .next-month {
        cursor: pointer;
    }

    p.event-item {
        margin: 4px auto;
        padding: 0px 2px;
        font-size: 12px;

        cursor: pointer;
        height: 18px;
        line-height: 18px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;

    }

    .is-opacity {
        opacity: 0.8;
    }
</style>