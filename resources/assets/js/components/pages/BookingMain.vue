<!--suppress ALL -->
<template>
    <div class="page-cover overlay">
        <navbar></navbar>
        <article>
            <container>
                <row>
                    <div class="col-12 mx-auto pt-4 pb-3">
                        <h1 class="text-center">Zarezerwuj Salę</h1>
                    </div>

                </row>
            </container>
        </article>

    </div>
</template>

<script>
  import Container from "bootstrap-vue/es/components/layout/container";
  import Row from "bootstrap-vue/es/components/layout/row";
  import Col from "bootstrap-vue/src/components/layout/col";
  import Navbar from "../page-part/Navbar";
  import MainFooter from "../page-part/MainFooter";

  export default {
    name: "booking-main",
    components: {
      MainFooter,
      Navbar,
      Col,
      Row,
      Container},
    data() {
      return {
        fcEvents: [
          {
            title: 'Sunny Out of Office',
            start: '2016-08-25',
            end: '2017-07-27'
          }
        ]
      }
    },
  }
</script>
<style scoped>
    .page-cover{
        position: absolute;
        min-width: 100%;
        min-height: 100%;

        background-image: url('../../../../../public/img/IMG_4630.jpg');
        background-repeat: no-repeat;
        background-position: top center;
        background-size: cover;
    }

</style>