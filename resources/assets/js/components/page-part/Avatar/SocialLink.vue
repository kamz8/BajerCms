<template>
  <a
    class="social-icons"
    :href="href"
    target="_blank"
  ><i
    class="fa"
    :class="'fa-'+type"
  /> </a>
</template>

<script>
export default {
  name: 'SocialLink',
  props: {
    type: {
      type: String,
      default: ''
    },
    href: {
      type: String,
      default: ''
    },
  },
};
</script>

<style scoped>
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
        z-index: 1;
        position: relative;
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
    .fa-instagram {
        padding:10px 9px;
        -o-transition:.5s;
        -ms-transition:.5s;
        -moz-transition:.5s;
        -webkit-transition:.5s;
        position: relative;
    }
    .fa-instagram:after{
        position: absolute;
        content: '';
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: #d6249f;
        background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);
        z-index: 0;
        opacity: 0;
        transition: opacity 0.5s ease-out;
    }
    .fa-instagram:hover:after {
        opacity: 1;
    }
    .social-icons > .fa-instagram:before{
        position: relative;
        z-index: 3;
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
