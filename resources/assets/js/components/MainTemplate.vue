<template>
    <div>
        <navbar></navbar>
        <router-view />

        <main-footer></main-footer>
        <to-top></to-top>
    </div>
</template>

<script>
    import Navbar from './page-part/Navbar';
    import ToTop from '../components/util/ToTop';
    import MainFooter from './page-part/MainFooter';
    export default {
        name: "main-template",
        components: {
            Navbar,
            ToTop,
            MainFooter
        },
    }
</script>

<style scoped>

</style>