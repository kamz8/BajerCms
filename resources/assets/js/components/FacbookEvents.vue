<template>
    <div class="fb-events">
        <div class="row">
            <div class="col-md-6 col-xs-12" v-for="event in getEventsStore">
                <article class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12">
                        <img class="img-fluid d-block" :src="event.cover.source"/>
                    </div>
                    <div class="clearfix "></div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 text-left">
                        <div class="row mt-3 mb-3">
                            <div class="col-12 d-sm-none pb-3 pb-md-0"><h2 class="title"><a :href="'https://www.facebook.com/events/'+event.id" target="_blank">{{event.name}}</a></h2></div>
                            <div class="col-4 col-sm-4 col-md-2 col-lg-2 text-pink">
                                <span class="gradient-border">
                                    <time>{{formatDate(event.start_time, 'day')}}</time>
                                </span>
                                <span class="d-block text-left text-md-center text-uppercase text-pink" >
                                    {{formatDate(event.start_time, 'month')}}
                                </span>
                            </div>
                            <div class="col-8 col-md-10 col-lg-10">
                                <h2 class="title d-none d-md-inline"><a :href="'https://www.facebook.com/events/'+event.id" target="_blank">{{event.name}}</a></h2>
                                <div class="row">
                                    <div class="col-4 col-md-3 pl-0 pl-md-2">
                                        <time class="hour-start"><i class="fa fa-clock-o"></i>&nbsp;{{hoursFromDate(event.start_time)}}</time>
                                    </div>
                                    <div class="col-8 col-md-9 pl-0 pl-md-2">
                                        <span class="place"><i class="fa fa-map-marker"></i>&nbsp;{{event.place.name}}</span>
                                    </div>
                                </div>
                                <div class="row event-description d-none d-md-block pl-0 pl-md-2">
                                    <p>{{event.description | truncate(200)}}</p>
                                </div>
                            </div>
                            <div class="col-12 event-description d-block d-md-none">
                                    <p>{{event.description | truncate(200)}}</p>
                            </div>
                        </div>

                    </div>
                </article>
                <div class="clearfix"></div>

            </div>

        </div>
    </div>

</template>

<script>
    //    @TODO : stała wysokość pola minaturki
    import moment from 'moment'
    export default {
        name: "facbook-events",
        data: function () {
            return {
                fbAccessToken: '133251397369840|ygfuetzG-1vxSaXAHrjC3oX0Dkk',
                errors: []
            }
        },
        methods: {
            formatDate: function (value, format = 'day') {
                if (value) {
                    let resault = {'day': moment(String(value)).format('D'), 'month': moment(String(value)).format('MMM') };
                    return (resault.hasOwnProperty(format)) ? resault[format]: ''
                }
            },
            hoursFromDate: function (value) {
                if (value) {
                    return moment(String(value)).format('hh:mm')
                }
            }
        },
        computed: {
            getEventsStore: function () {
                return this.$store.state.fbEvents
            },
        },
        filters: {
            'truncate': function (text, stop, clamp) {
                return text.slice(0, stop) + (stop < text.length ? clamp || '...' : '')
            }
        },
        created: function () {
            axios.get('https://graph.facebook.com/Klub.Studencki.Bajer/events?fields=cover,name,description,start_time,place&limit=2', {
                headers: {
                    Authorization: 'Bearer ' + this.fbAccessToken
                }
            })
                .then(response => {
                    this.$store.state.fbEvents = response.data.data
                })
                .catch(e => {
                    this.errors.push(e)
                })
            moment.locale('pl');
        }
    }
</script>

<style scoped>
    .fb-events {
        margin: 0 auto;
    }

    .container-image {
        position: relative;
        width: auto;
        height: 300px;
    }
    .title{
        line-height: 0.5rem;
    }
    .title > a {
        color: #13e1ee;
        padding: .5em 0px;
        text-transform: uppercase;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .title > a:hover {
        font-style: normal;
        text-decoration: none;

        opacity: .8;
    }
    .gradient-border{
        display: inline-block;
        position: relative;
        color: #ec1bd6;
        width: 65px;
        height: 65px;

        border: 8px solid transparent;
        -moz-border-image: -moz-linear-gradient( 45deg, rgb(239,30,217) 0%, rgb(129,129,232) 56%, rgb(18,227,246) 75%);
        -webkit-border-image: -webkit-linear-gradient( 45deg, rgb(239,30,217) 0%, rgb(129,129,232) 56%, rgb(18,227,246) 75%);
        border-image: linear-gradient( 45deg, rgb(239,30,217) 0%, rgb(129,129,232) 56%, rgb(18,227,246) 75%);
        border-image-slice: 1;
    }

    .gradient-border > time{
        font-size: 38px;
        font-weight: 500;
        text-align: center;
        vertical-align: middle;
        width: 100%;
        position: absolute;
        top: -8px;      /*value is realtive by border width and is all time negative*/
        left: 0;
    }

    .gradient-border + span{
        font-size: 24px;
    }

    .text-pink{
        color: #ec1bd6;
    }

    .event-description, .hour-start, .place{
        font-size: 14px;
    }

    .title > a {
        color: #13e1ee;
        word-break: break-all;
        word-wrap: break-word;
        overflow-x: hidden;
    }

    /*Make all responsive :P */
    @media only screen and (min-width: 320px) {
        .title > a {
            font-size: 20px;
        }
    }

    @media only screen and (min-width: 768px) {
    }
@media only screen and (min-width: 1280px){
    .title > a {
        font-size: 16px;
    }
}

</style>
