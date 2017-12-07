<template>

    <!-- the modal -->
    <b-modal id="addUser">
        <input type="text">
    </b-modal>

</template>

<script>
    export default {
    data: function () {

        return {
            user: [],
            id: '',
        }
    },
        methods: {
            addToTable(id){
                console.log(`add to table ${id}`);
            }
        },
        created: function(){
            this.fetchRoles();
        }
    }
</script>