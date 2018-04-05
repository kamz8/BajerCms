<template>
<main>
    <navbar></navbar>

    <router-view></router-view>

    <main-footer></main-footer>
    <to-top></to-top>
</main>
</template>

<script>
    import Navbar from '../components/Navbar';
    import ToTop from '../components/util/ToTop';
    import MainFooter from './MainFooter';
    export default {
        name: "app",
        components: {
            Navbar,
            ToTop,
            MainFooter
        },
    }
</script>

<style scoped>

</style>