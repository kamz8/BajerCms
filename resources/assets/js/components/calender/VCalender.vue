<template>
    <div class="calender-main">
        <header class="calender-header">
            <div class="row">
                <div class="col-12 text-center">
                    <p class="mx-auto">
                        <i class="fa fa-arrow-left pr-4"></i>
                        <span>Kwiecień</span>
                        <i class="fa fa-arrow-right pl-4"></i>
                    </p>

                </div>
            </div>
        </header>
        <div class="calender-body glass">
            <div class="weeks">
                <div class="vc-row">
                    <div class="vc-col week text-center" v-for="dayOfWeek in daysOfWeek"><p>{{dayOfWeek}}</p></div>
                </div>
            </div>
            <div class="dates">
                <div class="vc-row events-week" v-for="week in currentDates">
                    <div class="vc-col day-cell" v-for="day in week"
                         :class="{'today' : day.isToday,
                         'not-cur-month' : !day.isCurMonth}">
                        <p class="day-number">{{day.monthDay}}</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
  import moment from "moment"
  import dateFunc from "./dateFunc"

  export default {
    name: "vue-calender",
    props : {
      weekNames : {},
      monthNames : {}
    },
    data() {
      return {
        monthName: '',
        daysOfWeek: ['Pon.', 'Wt.', 'Śr.', 'Czw.', 'Pt.', 'Sob.', 'Niedz.'],
        // weekNames : DAY_NAMES,
        weekMask : [1,2,3,4,5,6,7],
        // events : [],
        isLismit : true,
        eventLimit : 3,
        showMore : false,
        morePos : {
          top: 0,
          left : 0
        },
        selectDay : {},
        events: {},
        currentDate : new Date(),
      }
    },
    methods: {
      getCalendar () {
        // calculate 2d-array of each month
        // first day of this month
        let now = new Date() // today
        let current = new Date(this.currentDate)

        let startDate = dateFunc.getStartDate(current)
        // let duration = this.getDuration(current) - 1
        // let endDate = this.changeDay(startDate,duration)

        let curWeekDay = startDate.getDay()
        // begin date of this table may be some day of last month
        startDate.setDate(startDate.getDate() - curWeekDay)

        let calendar = []
        // let isFinal = false

        for(let perWeek = 0 ; perWeek < 5 ; perWeek++) {

          let week = []

          for(let perDay = 0 ; perDay < 7 ; perDay++) {
            week.push({
              monthDay : startDate.getDate(),
              isToday : now.toDateString() == startDate.toDateString(),
              isCurMonth : startDate.getMonth() == current.getMonth(),
              weekDay : perDay,
              date : new Date(startDate),
              /*events : this.slotEvents(startDate)*/
            })

            startDate.setDate(startDate.getDate() + 1)
            // if (startDate.toDateString() == endDate.toDateString()) {
            //   isFinal = true
            //   break
            // }
          }

          calendar.push(week)
          // if (isFinal) break

        }
        return calendar
      },

    },
    computed: {
      currentDates () {
        return this.getCalendar()
      }
    },

  }
</script>

<style scoped>
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
        /*max-width: calc((100% / 7) - 0.1px);*/
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
    .not-cur-month{
        color: rgba(130,130,130,0.8);
    }
</style>