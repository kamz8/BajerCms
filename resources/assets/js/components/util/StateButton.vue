<template>
    <b-button :disabled="value" :variant="variant" type="submit" @input="updatePressed()">
          <span v-show="value"><i class="fa fa-spinner fa-spin"></i>&nbsp;{{label}}</span>
        <span v-show="!value"><slot ></slot></span>
    </b-button>
</template>

<script>
  export default {
    name: "state-button",
    props:{
      variant:{
      default: 'primary'
      },
      label: {
        type: String,
        default: 'ładowanie...'
      },
      value: Boolean
    },
    data() {
      return {

      }
    },
    methods: {
      updatePressed() {
        this.$emit('input', value)
      }
    },

  }
</script>

<style scoped>

</style>