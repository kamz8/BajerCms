<template>
  <b-card no-body>
    <b-card-header
      header-tag="header"
      @click="toggle()"
    >
      {{ title }} <i
        class="fa fa-4x fa-angle-up float-right "
        :class="{'fa-angle-down': isOpen}"
      />
    </b-card-header>
    <b-collapse
      :id="id"
      v-model="isOpen"
    >
      <b-card-body>
        <p class="card-text">
          <slot />
        </p>
      </b-card-body>
    </b-collapse>
  </b-card>
</template>

<script>
export default {
  name: 'DropdownCart',
  props: {
    title: {
      type: String,
      default: ''
    },
    id: {
      type: String,
      default: ''
    }
  },
  data: () => ({
    isOpen: false,
  }),
  methods: {
    toggle() {
      this.isOpen = !this.isOpen;
    },
  },
};

</script>

<style scoped>
    .fa{

    }
    .card-header{
        cursor: pointer;
    }
    .card-header:hover {
        background-color: #e8e8e8;
    }
    .card-header .fa {
        -webkit-transition: all 0.5s;
        transition: all 0.5s;
        font-size: 22px;
        color: #bbb;
    }
</style>
