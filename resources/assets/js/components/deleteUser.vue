<template>
    <!-- the modal -->
    <b-modal id="deleteUser">
        Napeno chcesz to usunąć?
    </b-modal>

</template>

<script>
    export default {
        name: "delete-user",
        methods: {
            delete: function (id) {
                console.log(`delete user`)
            }
        }
    }
</script>

<style scoped>

</style>