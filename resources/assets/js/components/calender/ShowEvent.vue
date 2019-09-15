<template>
  <div class="d-flex flex-column text-md-center">
    <b-popover
      :show.sync="show"
      :target="target"
      :title="event.title"
      style="color: #000"
      class="show-event"
    >
      <div class="col-12">
        <div class="row d-flex">
          <div class="col-2">
            <i class="fa fa-calendar" />
          </div>
          <div class="col-10">
            <data> {{ formatDate(event.start_date) }}</data>
          </div>
          <div class="clearfix" />
          <div class="col-2">
            <i class="fa fa-clock-o" />
          </div>
          <div class="col-10">
            <time>{{ formatTime(event.start_date) }}-{{ formatTime(event.end_date) }}</time>
          </div>
          <div class="clearfix" />
          <div class="col-2">
            <i
              class="fa"
              :class="(event.accepted)? 'fa-check' : 'fa-close' "
            />
          </div>
          <div class="col-10">
            <time>{{ (event.accepted) ? 'potwierdzono' : 'nie zaakceptowano' }}</time>
          </div>
        </div>
      </div>
    </b-popover>
  </div>
</template>

<script>
import moment from 'moment';

export default {
  name: 'ShowEvent',
  props: {
    popoverTrigger: {
      default: Boolean
    },
    event: {
      default: {}
    },
    target: {

    }
  },
  data() {
    return {
      show: false
    };
  },
  mounted() {
    this.trigger();
    this.popupItem = this.$el;
  },
  methods: {
    formatTime: function (time) {
      if (time) {
        return moment(time).format('HH:mm');
      }
      return '';
    },
    formatDate: function (time) {
      if (time) {
        return moment(time).format('DD-MM-YYYY');
      }
      return '';
    },
    trigger() {
      this.show = this.popoverTrigger;
    },
  },
};
</script>

<style>
    .popover-header {
        color: #222
    }

    .show-event {
        min-width: 200px;
    }
</style>
