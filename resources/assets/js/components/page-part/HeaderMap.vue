<template>
  <header
    id="mainHeader"
    ref="mainHeader"
    class="cover-heading overlay pb-0"
  >
    <div id="mapid" />
  </header>
</template>

<script>
import L from 'leaflet';
import elementResizeEvent from 'element-resize-event';
import { mapMutations } from 'vuex';
import { CHANGE_HEADER_HEIGHT } from '../../store/index';

export default {
  name: 'HeaderMap',
  data() {
    return {
      marker: { lat: 51.10320, lng: 17.08451 },
      map: null,
    };
  },
  computed: {
    headerHeight() {
      return this.$store.state.headerHeight;
    },
  },
  mounted() {
    const mainHeader = document.getElementById('mainHeader');
    this.changeHeaderHeight(mainHeader.offsetHeight);
    elementResizeEvent(mainHeader, this.headerHeightChangeListener);

    this.map = L.map('mapid').setView([this.marker.lat, this.marker.lng], 16);
    L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
      subdomains: ['a', 'b', 'c'],
    }).addTo(this.map);
    L.marker([this.marker.lat, this.marker.lng]).addTo(this.map);
  },
  methods: {
    ...mapMutations({
      changeHeaderHeight: CHANGE_HEADER_HEIGHT,
    }),
    headerHeightChangeListener() {
      const mainHeader = document.getElementById('mainHeader');
      const { headerHeight } = this;
      if (mainHeader.offsetHeight !== headerHeight) {
        this.changeHeaderHeight(mainHeader.offsetHeight);
      }
    },
  },
};
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
