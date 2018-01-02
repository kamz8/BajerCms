<template>
    <div class="fb-events">
        <div class="row" v-for="event in getEventsStore">
            <div class="col-xs-12">
                <h1><a :href="'https://www.facebook.com/events/'+event.id">{{event.title}}</a></h1>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12" >
                <img class="img-responsive" v-bind:src="event.cover.source" />
            </div>

        </div>
    </div>

</template>

<script>
    export default {
        name: "facbook-events",
        data: function(){
            return {
                fbAccessToken: '133251397369840|ygfuetzG-1vxSaXAHrjC3oX0Dkk',
                errors: []
            }
        },
        computed:{
          getEventsStore: function(){
              return this.$store.state.fbEvents
          }
        },
        created: function () {
           axios.get('https://graph.facebook.com/Klub.Studencki.Bajer/events?fields=cover,description,start_time,place&limit=3',{
               headers: {
                Authorization: 'Bearer ' + this.fbAccessToken
            }})
               .then(response => {this.$store.state.fbEvents = response.data.data})
               .catch(e => {
               this.errors.push(e)
           })
        }
    }
</script>

<style scoped>
.fb-events{
    margin: 0 auto;
}
.container-image{
    position: relative;
    width: auto;
    height:300px;
}
</style>
