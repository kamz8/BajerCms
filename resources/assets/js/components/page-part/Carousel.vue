<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <b-carousel
          id="carousel-1"
          v-model="slide"
          :interval="interval"
          controls
          background="#ababab"
          style="text-shadow: 1px 1px 2px #333;"
          @sliding-start="onSlideStart"
          @sliding-end="onSlideEnd"
        >
          <!-- Text slides with image -->
          <b-carousel-slide v-for="photo in photos"
                            caption=""
                            v-bind:text="photo.text"
                            v-bind:key="photo.src"
                            text-tag="p"
                            content-visible-up="md"
          >
            <img
              slot="img"
              class="d-block img-fluid w-100"
              :src="photo.src"
              :alt="photo.text"
            >
          </b-carousel-slide>
        
        </b-carousel>
        <span class="d-md-none" style="font-size: 0.8rem">{{photos[slide].text}}</span>
      </div>
    </div>
  </div>
</template>

<script>

  export default {
    name: 'Carousel',
    props: {
      interval: {
        type: Number,
        default: 4000
      },
      photos: {
        type: Array,
        required: true
      }
    },
    data() {
      return {
        slide: 0,
        sliding: null
      }
    },
    methods: {
      onSlideStart(slide) {
        this.sliding = true
      },
      onSlideEnd(slide) {
        this.sliding = false
      }
    }
  }
</script>

<style scoped>

</style>