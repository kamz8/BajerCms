<template>
  <div
    id="datetimepicker1"
    class="input-group date"
    data-target-input="nearest"
  >
    <input
      type="text"
      class="form-control datetimepicker-input"
      data-target="#datetimepicker1"
    >
    <div
      class="input-group-append"
      data-target="#datetimepicker1"
      data-toggle="datetimepicker"
    >
      <div class="input-group-text">
        <i class="fa fa-calendar" />
      </div>
    </div>
  </div>
</template>

<script type="text/javascript">
import 'tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css';

const jQuery = require('jquery');
const moment = require('moment');
require('tempusdominus-bootstrap-4');
// You have to import css yourself
// Events list without prefix
// http://eonasdan.github.io/bootstrap-datetimepicker/Events/
const events = ['hide', 'show', 'change', 'error', 'update'];
export default {
  name: 'DatePicker',
  props: {
    value: {
      default: null,
      required: true,
      validator(value) {
        return value === null || value instanceof Date || typeof value === 'string' || value instanceof String || value instanceof moment;
      },

    },
    // http://eonasdan.github.io/bootstrap-datetimepicker/Options/
    config: {
      type: Object,
      default: () => ({}),
    },
    /**
       * You can set this to true when component is wrapped in input-group
       * Note: inline and wrap mode wont work together
       */
    wrap: {
      type: Boolean,
      default: false,
    },
  },
  data() {
    return {
      dp: null,
      // jQuery DOM
      elem: null,
      planned_datetime: '',

    };
  },
  watch: {
    /**
       * Listen to change from outside of component and update DOM
       *
       * @param newValue
       */
    value: function(newValue) {
      if (this.dp) {
        this.dp.date = newValue || null;
      }
    },
    /**
       * Watch for any change in options and set them
       *
       * @param newConfig Object
       */
    config: function(newConfig) {
      if (this.dp) {
        this.dp.options = { ...this.dp.options(), ...newConfig };
      }
    },
  },
  mounted() {
    // Return early if date-picker is already loaded
    /* istanbul ignore if */
    if (this.dp) return;
    // Handle wrapped input
    const node = this.wrap ? this.$el.parentNode : this.$el;
    // Cache DOM
    this.elem = jQuery(node);
    // Init date-picker
    this.elem.datetimepicker(this.config);
    // Store data control
    this.dp = this.elem.data('DateTimePicker');
    // Set initial value
    this.dp.date(this.value);
    // Watch for changes
    this.elem.on('dp.change', this.onChange);
    // Register remaining events
    this.registerEvents();
  },
  beforeDestroy() {
    // Free up memory
    /* istanbul ignore else */
    if (this.dp) {
      this.dp.destroy();
      this.dp = null;
      this.elem = null;
    }
  },
  methods: {
    /**
       * Update v-model upon change triggered by date-picker itself
       *
       * @param event
       */
    onChange(event) {
      const formattedDate = event.date ? event.date.format(this.dp.format()) : null;
      this.$emit('input', formattedDate);
    },
    /**
       * Emit all available events
       */
    registerEvents() {
      events.forEach((name) => {
        this.elem.on(`dp.${name}`, (...args) => {
          this.$emit(`dp-${name}`, ...args);
        });
      });
    },
  },
};
</script>
