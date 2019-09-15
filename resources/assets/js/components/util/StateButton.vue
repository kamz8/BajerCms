<template>
  <b-button
    :disabled="value"
    :variant="variant"
    type="submit"
    @input="updatePressed()"
  >
    <span v-show="value"><i class="fa fa-spinner fa-spin" />&nbsp;{{ label }}</span>
    <span v-show="!value"><slot /></span>
  </b-button>
</template>

<script>
export default {
  name: 'StateButton',
  props: {
    variant: {
      default: 'primary',
      type: String
    },
    label: {
      type: String,
      default: 'ładowanie...',
    },
    value: Boolean,
  },
  data() {
    return {

    };
  },
  methods: {
    updatePressed() {
      this.$emit('input');
    },
  },

};
</script>

<style scoped>

</style>
