<template>
  <figure class="member avatar mx-auto d-block">
    <img
      class="img-fluid"
      :src="avatarImg"
    >
    <figcaption class="caption text-center">
      <div class="container">
        <div class="row mb-2">
          <div class="col-12">
            {{ name }}
          </div>
          <div
            v-if="memberType"
            class="col-12"
          >
            {{ memberType }}
          </div>
        </div>
        <div
          v-if="phone"
          class="row mb-2"
        >
          <div class="col-lg-2">
            <i class="fa fa-phone" />
          </div>
          <div class="col-lg-10">
            <a :href="'tel:'+phone">{{ phone }}</a>
          </div>
        </div>
        <div
          v-if="email"
          class="row mb-2"
        >
          <div class="col-lg-2">
            <i class="fa fa-envelope" />
          </div>
          <div class="col-lg-10">
            <a :href="'mailto:'+email">{{ emailWithZeroWidthSpace }}</a>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <span class="member-link text-center">
              <slot />
            </span>
          </div>
        </div>
      </div>
    </figcaption>
  </figure>
</template>

<script>
import _ from 'lodash';

export default {
  name: 'Avatar',
  props: {
    name: {
      type: String,
      default: '',
    },
    avatarImg: {
      type: String,
      default: '',
    },
    phone: {
      type: String,
      default: '',
    },
    email: {
      type: String,
      default: '',
    },
    memberType: {
      type: String,
      default: '',
    },
  },
  computed: {
    emailWithZeroWidthSpace() {
      if (!this.email) return undefined;
      return _.replace(this.email, '@', '​@​');
    },
  },
};
</script>

<style scoped>
  figcaption > span {
    line-height: 1.6em;
  }

  a {
    color: #ffffff;
  }
</style>
