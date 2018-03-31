<template>
    <div class="affix-top position-fixed"
         :class="{'d-block': scrollPosition > 900, 'd-none': scrollPosition < 900}"
    v-on:click="scrollToTop">
        <button class="btn btn-sm btn-dark">
            <i class="fa fa-chevron-up fa-2x"></i>
        </button>
    </div>
</template>

<script>
    import infiniteScroll from 'vue-infinite-scroll'
    export default {
        name: "to-top",
        directives:{
            infiniteScroll
        },
        data: function () {
            return {
                scrollPosition: 0,
                headerHeight: 0
            }
        },
        methods: {
            updateScroll() {
                this.scrollPosition = window.scrollY
            },
            scrollToTop() {
                this.$nextTick(function(){
                    app.scrollTop = 0;
                });
            }
        },
        created() {
            window.addEventListener('scroll', this.updateScroll);
        }
    }
</script>

<style scoped>
.affix-top{
    bottom: -50px;
    right: 0;

    padding: 15px;
}
.affix-top.d-block{
    bottom: 0;
    transition: bottom ease-in .3s;
}
.affix-top.d-none{
    bottom: -50px;
    transition: bottom ease-in .3s;
}
</style>