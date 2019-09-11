<template>
  <figure class="member avatar mx-auto d-block">
    <img class="img-fluid"
         :src="avatarImg">
    <figcaption class="caption text-center">
      <div class="container">
        <div class="row mb-2">
          <div class="col-12">{{name}}</div>
            <div class="col-12" v-if="memberType">{{memberType}}</div>
        </div>
        <div class="row mb-2" v-if="phone">
          <div class="col-lg-2"><i class="fa fa-phone"></i></div>
          <div class="col-lg-10"><a :href="'tel:'+phone">{{phone}}</a></div>
        </div>
        <div class="row mb-2" v-if="email">
          <div class="col-lg-2"><i class="fa fa-envelope"></i></div>
          <div class="col-lg-10"><a :href="'mailto:'+email">{{emailWithZeroWidthSpace}}</a></div>
        </div>
        <div class="row">
          <div class="col">
              <span class="member-link text-center">
              <slot/>
            </span>
          </div>
        </div>
      </div>
    </figcaption>
  </figure>
</template>

<script>
  import socialLink from './SocialLink'
  import _ from 'lodash'

  export default {
    name: "avatar",
    props: {
      'name': {
        default: ''
      }, 'avatarImg': {
        default: ''
      }, 'phone': {
        default: ''
      }, 'email': {
        default: ''
      },
      memberType: {
        default: ''
      }
    },
    components: {
      socialLink
    },
    computed: {
      emailWithZeroWidthSpace: function () {
        if (!this.email) return undefined;
        return _.replace(this.email, '@', '​@​');
      }
    }
  }
</script>

<style scoped>
  figcaption > span {
    line-height: 1.6em;
  }
  
  a {
    color: #ffffff;
  }
</style>
