<template>
    <div class="d-flex flex-column text-md-center">
        <b-popover :show.sync="popoverTrigger" :target="target" :title="event.title">
            <div class="col-12">
                <div class="row d-flex">
                    <span><i class="fa fa-clock-o"></i> {{event.start_time}}-{{event.end_time}}</span>
                </div>
            </div>
        </b-popover>
    </div>
</template>

<script>
  export default {
    name: "show-event",
    props: ['popoverTrigger', 'event'],
    computed: {
      target() {
        if(this.event){
          return 'event-'+this.event.start_date
        }
        return 'event-0'
      }
    },
  }
</script>

<style scoped>

</style>