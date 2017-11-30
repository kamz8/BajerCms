<template>

<button class="btn btn-success" @onclick="addToTable(item.id)"><i class="fa fa-pu fa-lg"></i> Edytuj</button>&nbsp;

</template>

<script>
    export default {
        props: ['item'],
        methods: {
            addToTable(id){
                console.log(`add to table ${id}`);
            }
        }
    }
</script>