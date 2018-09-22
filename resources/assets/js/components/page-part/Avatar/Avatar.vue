<template>
    <figure class="member avatar mx-auto d-block">
        <img class="img-fluid"
             :src="avatarImg">
        <figcaption class="caption text-center">
            <span>{{name}}</span>
            <span v-if="memberType" class="member-title">{{memberType}}</span>
            <span class="text-left">
                <i v-if="phone" class="fa fa-phone"></i>&nbsp; {{phone}} <br/>
                <i v-if="email" class="fa fa-envelope"></i> {{email}}
            </span>
            <span class="member-link text-left">
              <slot/>
            </span>
        </figcaption>
    </figure>
</template>

<script>
    import socialLink from './SocialLink'
  export default {
    name: "avatar",
    props: {'name':{
        default: ''
      },'avatarImg':{
        default: ''
      },'phone':{
        default: ''
      },'email':{
        default: ''
      },
      memberType: {
      default: ''
      }
    },
    components: {
      socialLink
    }
  }
</script>

<style scoped>
    figcaption > span {
        line-height: 1.6em;
    }

</style>