<template>
    <div class="fb-events container-fluid">
        <div class="row" v-for="event in data">
            <div class="col-md-12"><h1><a v-bind:href="'https://www.facebook.com/events/'+event.id">{{event.title}}</a><small>{{event.start_time | formatDate}}</small></h1></div>
            <div class="col-md-6"><img class="img-responsive center-block" v-bind:src="event.cover.source" /></div>
            <div class="col-md-6">{{event.description}}</div>
        </div>
    </div>

</template>

<script>
    import moment from 'moment';
    export default {
        name: "facebook-events",
        comments: {
            moment
        },
        data: function () {
            return {
                fbAccessToken: '1973774596209248|CmU_PwNBsEjVwuDvcKariv6D_Xw',
                errors: [],
                data: [
                    {
                        "cover": {
                            "offset_x": 0,
                            "offset_y": 0,
                            "source": "https://scontent.xx.fbcdn.net/v/t31.0-8/s720x720/24059316_1850009958344867_8403283864530931247_o.jpg?oh=4f273d0cd40cac3468402328ce45be91&oe=5AC82404",
                            "id": "1850009958344867"
                        },
                        "title": "All I want for Christmas is Bajer",
                        "description": "Hoł Hoł Hoł !\n\nNadal wyczekujesz pierwszej gwiazdki i Świętego Mikołaja?🎅 Chciałbyś usłyszeć jak Rudolf przemawia ludzkim głosem lub śpiewać jak Zenek Martyniuk?☄\n\nJeżeli tak jak Klub Studencki Bajer poczułeś już magię Świąt, to nie zwlekaj  i wpadaj na nasze Karaoke🎙🎶 Zapraszamy zarówno estradowych weteranów, jak i tych, dla których śpiewanie = prysznic. A osoby, które lubią się pobawić przy klasykach muzyki klubowej, też znajdą coś dla siebie🎸\n\nDla naszych gości  Mikołaj razem z Rudolfem przygotowali wiele świątecznych niespodzianek i łakoci🎁 Gwarantujemy ciepłą, świąteczną atmosferę, parkiet rozgrzany do czerwoności i największe szlagiery polskich kolęd 👌✔\nTo wszystko i jeszcze więcej już 15 grudnia. Startujemy o 20:00! Nie ma na co czekać!  Przyjdź do Nas i zobacz jak z kopyta Bajer rwie ! ⛄\n\nP.S Kevin został sam w Bajerze i wypił wszystkie trunki, dlatego klub nie prowadzi sprzedaży – zaopatrzcie się we własnym zakresie.🔥",
                        "start_time": "2017-12-15T20:00:00+0100",
                        "id": "189236918303659"
                    }
                ],
                "paging": {
                    "cursors": {
                        "before": "QVFIUmtaekhUSjBTQmRoSmFBOUtDUmhIUGszcmIwaXdtZAVQ1MldQMkVPWkEyVTlfdVpBNHQ1a25aSFViNFl6ZA09uT2pzQllTQ2VoQk9WTkQ1blo2bVBtUkJn",
                        "after": "QVFIUmtaekhUSjBTQmRoSmFBOUtDUmhIUGszcmIwaXdtZAVQ1MldQMkVPWkEyVTlfdVpBNHQ1a25aSFViNFl6ZA09uT2pzQllTQ2VoQk9WTkQ1blo2bVBtUkJn"
                    }
                }
            }
        },
        methods: {
            fetchEvents: function () {
                axios('https://graph.facebook.com/Klub.Studencki.Bajer/events?fields=cover,description,start_time&time_filter=upcoming',{
                    headers: {
                        Authorization: 'Bearer ' + this.fbAccessToken
                    }})
                    .then(resault => {
                        console.log(resault);
                        console.log(this.$store.state.fbEvents);
                        this.$store.state.fbEvents = resault.data;
                    }).catch(e => {
                    this.errors.push(e)
                })
            }
        },
        computed:{
          getEvents: function(){
              return this.$store.state.fbEvents
          }
        },
        filters:{
            formatDate: function(value){
                if (value) {
                    return moment(String(value)).format('Do MMM')
                }
            }
        },
        created: function () {
            //this.fetchEvents();
            moment.locale('pl');
        }
    }
</script>

<style scoped>
.fb-events{
    font-size: 14px;
}
</style>