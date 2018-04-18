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
                    <div class="vc-col day-cell" v-for="day in week"
                         :class="{'today' : day.isToday,
                         'not-cur-month' : !day.isCurMonth}">
                        <p class="day-number">{{day.monthDay}}</p>
                        <div class="event-box">
                            <p class="event-item" v-for="event in day.events" v-show="event.cellIndex <= eventLimit"
                           :class="{
                  'is-start'   : isStart(event.start, day.date),
                  'is-end'     : isEnd(event.end,day.date),
                  'is-opacity' : !event.isShow,
                  'bg-danger': !event.accepted,
                  'bg-info': event.accepted
                  }"
                           @click="eventClick(event,$event)">
                            {{event.title | isBegin day.date day.weekDay}}
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
  import dateFunc from "./dateFunc"

  export default {
    name: "vue-calender",
    props : {
      events:[],
      locale: {
        default: 'pl'
      }
    },
    data() {
      return {
        monthName: '',
        daysOfWeek: null, // ['Pon.', 'Wt.', 'Śr.', 'Czw.', 'Pt.', 'Sob.', 'Niedz.'],
        weekMask : [1,2,3,4,5,6,7],
        isLismit : true,
        eventLimit : 3,
        showMore : false,
        morePos : {
          top: 0,
          left : 0
        },
        selectDay : {},
        currentDate : new Date,
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
              events : this.slotEvents(startDate)
            })
            console.log(startDate)
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
      slotEvents(date) {

        // find all events start from this date
        let cellIndexArr = []
        let thisDayEvents = this.events.filter(day => {
          let dt = new Date(day.start_date)
          let st = new Date(dt.getFullYear(),dt.getMonth(),dt.getDate())
          let ed = day.end ? new Date(day.end_date) : st
          return date>=st && date<=ed
        })

        // sort by duration
        thisDayEvents.sort((a,b)=>{
          if(!a.cellIndex) return 1
          if (!b.cellIndex) return -1
          return a.cellIndex - b.cellIndex
        })

        // mark cellIndex and place holder
        for (let i = 0;i<thisDayEvents.length;i++) {
          thisDayEvents[i].cellIndex = thisDayEvents[i].cellIndex || (i + 1)
          thisDayEvents[i].isShow = true
          if (thisDayEvents[i].cellIndex == i+1 || i>2) continue
          thisDayEvents.splice(i,0,{
            title : 'holder',
            cellIndex : i+1,
            start_date : dateFunc.format(date,'yyyy-MM-dd'),
            end_date : dateFunc.format(date,'yyyy-MM-dd'),
            isShow : false
          })
        }

        return thisDayEvents
      },
      isStart (eventDate, date) {
        let st = new Date(eventDate)
        return st.toDateString() === date.toDateString()
      },
      isEnd (eventDate,date) {
        let ed = new Date(eventDate)
        return ed.toDateString() === date.toDateString()
      },
      nextMonth () {
        this.currentDate = moment(this.currentDate).add(1, 'month')
      },

      prevMonth () {
        this.currentDate = moment(this.currentDate).subtract(1, 'month')
      }
    },
    computed: {
      currentDates () {
        return this.getCalendar()
      },

      /**
       * @return {string}
       */
      MonthName () {
        return moment(this.currentDate).format('MMMM YYYY');
      }
    },

    created () {
      console.log(this.locale)
      moment.locale(this.locale)

      this.daysOfWeek = moment.weekdaysShort(true)
    }

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
    .today{
        .day-number{
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
    .not-cur-month{
        color: rgba(130,130,130,0.8);
    }
    .prev-month, .next-month{
        cursor: pointer;
    }

    p.event-item{
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
    .is-opacity{
        opacity: 0.8;
    }
</style>