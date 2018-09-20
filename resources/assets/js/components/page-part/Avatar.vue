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
                <a class="social-icons" href="" target="_blank"><i class="fa fa-facebook"></i> </a>
                <a class="social-icons" href="" target="_blank"><i class="fa fa-soundcloud"></i> </a>
                <a class="social-icons" href="" target="_blank"><i class="fa fa-mixcloud"></i> </a>
                <a class="social-icons" href="" target="_blank"><i class="fa fa-spotify"></i> </a>
                <a class="social-icons" href="" target="_blank"><i class="fa fa-globe"></i> </a>
            </span>
        </figcaption>
    </figure>
</template>

<script>
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
      social: {
        default: {
          'facebook': '',
          'twitter': '',
          'soundcloud': '',
          'mixcloud': '',
          'spotify': ''
        }
      },
      memberType: {
      default: ''
      }
    },
  }
</script>

<style scoped>
    figcaption > span {
        line-height: 1.6em;
    }
    .social-icons {
        color: #fff;
    }
    ul.social-icons {
        margin-top: 10px;
    }
    .social-icons li {
        vertical-align: top;
        display: inline;
        height: 100px;
    }
    .social-icons a {
        color: #fff !important;
        text-decoration: none;
    }
    .fa-facebook {
        padding:10px 14px;
        -o-transition:.5s;
        -ms-transition:.5s;
        -moz-transition:.5s;
        -webkit-transition:.5s;
        transition: .5s;
    }
    .fa-facebook:hover {
        background-color: #3d5b99;
    }
    .fa-twitter {
        padding:10px 12px;
        -o-transition:.5s;
        -ms-transition:.5s;
        -moz-transition:.5s;
        -webkit-transition:.5s;
        transition: .5s;
    }
    .fa-twitter:hover {
        background-color: #00aced;
    }
    .fa-rss {
        padding:10px 14px;
        -o-transition:.5s;
        -ms-transition:.5s;
        -moz-transition:.5s;
        -webkit-transition:.5s;
        transition: .5s;
    }
    .fa-rss:hover {
        background-color: #eb8231;
    }
    .fa-youtube {
        padding:10px 14px;
        -o-transition:.5s;
        -ms-transition:.5s;
        -moz-transition:.5s;
        -webkit-transition:.5s;
        transition: .5s;
    }
    .fa-youtube:hover {
        background-color: #e64a41;
    }
    .fa-linkedin {
        padding:10px 14px;
        -o-transition:.5s;
        -ms-transition:.5s;
        -moz-transition:.5s;
        -webkit-transition:.5s;
        transition: .5s;
    }
    .fa-linkedin:hover {
        background-color: #0073a4;
    }
    .fa-google-plus {
        padding:10px 9px;
        -o-transition:.5s;
        -ms-transition:.5s;
        -moz-transition:.5s;
        -webkit-transition:.5s;
        transition: .5s;
    }
    .fa-google-plus:hover {
        background-color: #e25714;
    }
    .fa-spotify {
        padding:10px 9px;
        -o-transition:.5s;
        -ms-transition:.5s;
        -moz-transition:.5s;
        -webkit-transition:.5s;
        transition: .5s;

    }
    .fa-spotify:hover {
        background-color: #1ed760;
    }
    .fa-soundcloud {
        padding:10px 9px;
        -o-transition:.5s;
        -ms-transition:.5s;
        -moz-transition:.5s;
        -webkit-transition:.5s;
        transition: .5s;

    }
    .fa-soundcloud:hover {
        background-color: #ff8800;
    }
    .fa-mixcloud {
        padding:10px 9px;
        -o-transition:.5s;
        -ms-transition:.5s;
        -moz-transition:.5s;
        -webkit-transition:.5s;
        transition: .5s;

    }
    .fa-mixcloud:hover {
        background-color: #273a4b;
    }

    .fa-globe {
        padding:10px 9px;
        -o-transition:.5s;
        -ms-transition:.5s;
        -moz-transition:.5s;
        -webkit-transition:.5s;
        transition: .5s;

    }
    .fa-globe:hover {
        background-color: #111;
    }
</style>