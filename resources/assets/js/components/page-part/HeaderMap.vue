<template>
    <header id="mainHeader" class="cover-heading overlay" ref="mainHeader" style="400px">
        <gmap-map
                :center="center"
                :zoom="16"
                style="width:100%;  height: 400px;"
                class="map"
        >
            <GmapMarker
                    :key="index"
                    v-for="(m, index) in markers"
                    :position="m.position"
                    :clickable="true"
                    :draggable="true"
                    @click="center=m.position"
            />
        </gmap-map>
<!--        <div class="container mx-auto mh-100">
            <div class="row">
                <div class="col-lg-8 mx-auto pt-5 pb-5">
                    <div class="logo">
                        <h1>{{vtitle}}</h1>
                    </div>
                    <a href="#" class="btn btn-circle align-text-bottom mt-4" v-scroll-to="scrollTo">
                        <i class="fa fa-2x fa-angle-double-down"></i>
                    </a>
                </div>
            </div>
        </div>-->
    </header>
</template>

<script>
    export default {
        name: "header-map",
        props: ['vtitle','scrollTo','coverImg'],
      data() {
        return {
          // default to Montreal to keep it simple
          // change this to whatever makes sense
          center: { lat: 51.1031429, lng: 17.0844891 },
          markers: [],
          places: [],
          currentPlace: null
        };
      },

      mounted() {
        this.addMarker();
      },

      methods: {
        // receives a place object via the autocomplete component
        setPlace(place) {
          this.currentPlace = place;
        },
        addMarker() {
          if (this.center) {
            const marker = {
              lat: this.center.lat,
              lng: this.center.lng
            };
            this.markers.push({ position: marker });
            this.places.push(this.center);
            this.center = marker;
            this.currentPlace = null;
          }
        },
      }
    }
</script>

<style scoped>
    header.cover-heading{
        display: table;
        width: 100%;
        height: 400px;
        padding: 80px 0;
        text-align: center;
        color: #fff;
        background-color: rgba(0, 0, 0, 0);
        background-position: center center;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
    .cover-heading > .container{
        min-height: 400px;
    }
    .map{
        position: absolute;
        top: 0;
    }
</style>