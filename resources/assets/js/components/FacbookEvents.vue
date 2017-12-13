<template>
    <div class="fb-events">
        <div class="row" v-for="event in getEventsStore">
            <div class="col-xs-12"><img class="img-responsive" v-bind:src="event.cover.source" /></div>
        </div>
    </div>

</template>

<script>
    export default {
        name: "facbook-events",
        data: {
            return: {
                fbAccessToken: '1973774596209248|CmU_PwNBsEjVwuDvcKariv6D_Xw',
                fbEvents: [],
                errors: []
            }
        },
        computed:{
          getEventsStore: function(){
              this.fbEvents = this.$store.state.fbEvents
          }
        },
        created: function () {
           axios.get('https://graph.facebook.com/Klub.Studencki.Bajer/events?fields=cover,description,start_time&time_filter=upcoming',{
               headers: {
                Authorization: this.fbAccessToken
            }})
               .then(response => this.$store.state.fbEvents)
               .catch(e => {
               this.errors.push(e)
           })
        }
    }
</script>

<style scoped>

</style>