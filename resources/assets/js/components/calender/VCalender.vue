<template>
  <div class="calender-main">
    <header class="calender-header">
      <div class="row">
        <div class="col-12 text-center">
          <p class="mx-auto">
            <i
              class="fa fa-arrow-left pr-4 prev-month"
              @click="prevMonth"
            />
            <span class="text-capitalize">{{ MonthName }}</span>
            <i
              class="fa fa-arrow-right pl-4 next-month"
              @click="nextMonth"
            />
          </p>
        </div>
      </div>
    </header>
    <div class="calender-body glass">
      <div class="weeks">
        <div class="vc-row">
          <div
            v-for="(dayOfWeek, index) in daysOfWeek"
            :key="index"
            class="vc-col week text-center "
          >
            <p>{{ dayOfWeek }}.</p>
          </div>
        </div>
      </div>
      <div class="dates">
        <div
          v-for="(week, index) in currentDates"
          :key="index"
          class="vc-row events-week"
        >
          <div
            v-for="(day, i) in week"
            :key="i"
            class="vc-col day-cell"
            :class="{'today' : day.isToday,
                     'not-cur-month' : !day.isCurMonth}"
            @click="showAddModal()"
          >
            <p class="day-number">
              {{ day.monthDay }}
            </p>
            <div class="event-box">
              <p
                v-for="(event, n) in day.events"
                :id="'event-'+event.id"
                :key="n"
                class="event-item"
                :class="{
                  'bg-danger': !event.accepted,
                  'bg-info': event.accepted,
                  'd-none': n>1
                }"
                :v-click-outside="showMore = false"
                @click.stop="eventClick(event,$event)"
              >
                {{ formatTime(event.start_date)+" "+ event.title }}
                <show-event
                  :popover-trigger="showMore"
                  :event="event"
                  :target="'event-'+event.id"
                />
              </p>
            </div>
          </div>
        </div>
      </div>
      <a
        v-show="isLogged"
        href="#"
        class="btn btn-danger btn-circle add-event"
        @click.prevent="showAddModal()"
      >
        <i class="fa fa-plus" />
      </a>
    </div>
    <add-event :modal-show.sync="modalShow" />
  </div>
</template>

<script>
import moment from 'moment';
import ClickOutside from 'vue-click-outside';
import { mapGetters } from 'vuex';
import ShowEvent from './ShowEvent';
import AddEvent from './AddEvent';

export default {
  name: 'VueCalender',
  components: {
    AddEvent,
    ShowEvent,
  },
  // do not forget this section
  directives: {
    ClickOutside,
  },
  props: {
    events: {
      type: Array,
      // eslint-disable-next-line vue/require-valid-default-prop
      default: [],
    },
    locale: {
      type: String,
      default: 'pl',
    },
  },
  data() {
    return {
      monthName: '',
      daysOfWeek: null, // ['Pon.', 'Wt.', 'Śr.', 'Czw.', 'Pt.', 'Sob.', 'Niedz.'],
      isLismit: true,
      eventLimit: 3,
      selectedEvent: null,
      showMore: false,
      modalShow: false,
      morePos: {
        top: 0,
        left: 0,
      },
      selectDay: {},
      currentDate: moment.utc(moment(), 'YYYY-MM-DD'),
    };
  },
  computed: {
    currentDates() {
      return this.getCalendar();
    },

    /**
     * @return {string}
     */
    MonthName() {
      return moment(this.currentDate).locale(this.locale).format('MMMM YYYY');
    },
    ...mapGetters({
      isLogged: 'logged',
    }),
  },
  created() {
    moment.locale(this.locale);
    this.daysOfWeek = moment.weekdaysShort(true);
  },
  mounted() {
    this.popupItem = this.$el;
  },
  methods: {
    getCalendar() {
      // calculate 2d-array of each month
      // first day of this month
      const now = moment.utc(moment(), 'YYYY-MM-DD'); // today
      const current = moment(this.currentDate).utc();
      // return first day of this month
      const startDate = current.subtract(1, 'month').endOf('month').day('Monday');
      const endDate = moment(current).add(1, 'month').endOf('month').day(7);

      // begin date of this table may be some day of last month
      // startDate.setDate(startDate.getDate() - curWeekDay)

      const calendar = [];

      for (let perWeek = 0; perWeek < 6; perWeek++) {
        const week = [];
        for (let perDay = 0; perDay < 7; perDay++) {
          week.push({
            monthDay: startDate.date(),
            isToday: now.format('YYYY-MM-DD') === startDate.format('YYYY-MM-DD'),
            isCurMonth: startDate.month() === this.currentDate.month(),
            weekDay: startDate.weekday(),
            date: startDate,
            events: this.slotEvents(startDate),
          });
          startDate.add(1, 'day');
        }

        calendar.push(week);
        if (startDate.isSameOrAfter(endDate)) break;
      }
      return calendar;
    },
    slotEvents(date) {
      return this.events.filter((event) => {
        const startDate = moment(event.start_date);

        return date.format('YYYY-MM-DD') === startDate.format('YYYY-MM-DD');
      });
    },
    isStart(eventDate, date) {
      return eventDate.toString() === date.toString();
    },
    isEnd(eventDate, date) {
      const ed = moment(eventDate);
      return ed.toString() === moment(date).toString();
    },
    nextMonth() {
      const nextMonth = moment.utc(this.currentDate, 'YYYY-MM-DD').add(1, 'month');
      this.currentDate = nextMonth;
      this.$emit('nextMonth', {
        nextMonth,
      });
    },

    prevMonth() {
      const prevMonth = moment.utc(this.currentDate, 'YYYY-MM-DD').subtract(1, 'month');
      this.currentDate = prevMonth;
      this.$emit('prevMonth', {
        prevMonth,
      });
    },
    eventClick(event) {
      this.$root.$emit('bv::hide::popover');
      this.selectedEvent = event;
      this.showMore = !this.showMore;
    },
    formatTime(time) {
      if (time) {
        return moment(time).format('HH:mm');
      }
      return '';
    },
    showAddModal() {
      if (this.isLogged) {
        this.$root.$emit('bv::show::modal', 'modal-add');
      } else {
        this.$emit('notAuth');
      }
    },
  },

};
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
    .btn.add-event{
        border-color: transparent;

        position: absolute;
        bottom: 1em;
        right: 1em;
    }
</style>
