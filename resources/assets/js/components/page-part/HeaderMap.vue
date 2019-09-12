<template>
  <header id="mainHeader" class="cover-heading overlay pb-0" ref="mainHeader">
    <div id="mapid"></div>
  </header>
</template>

<script>
  import L from 'leaflet';

  export default {
    name: "header-map",
    props: ['vtitle', 'scrollTo', 'coverImg'],
    data() {
      return {
        marker: {lat: 51.10320, lng: 17.08451},
        map: null
      };
    },

    mounted() {
      this.map = L.map('mapid').setView([this.marker.lat, this.marker.lng], 16);
      L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
        subdomains: ['a', 'b', 'c']
      }).addTo(this.map);
      L.marker([this.marker.lat, this.marker.lng]).addTo(this.map);
    }
  }
</script>

<style scoped>
  header.cover-heading {
    display: table;
    width: 100%;
    height: 400px;
    padding: 74px 0;
    text-align: center;
    color: #fff;
    background-color: rgba(0, 0, 0, 0);
    background-position: center center;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
  }
  
  .cover-heading > .container {
    min-height: 400px;
  }
  
  .map {
    position: absolute;
    top: 0;
  }
  
  #mapid {
    height: 400px;
  }
</style>
