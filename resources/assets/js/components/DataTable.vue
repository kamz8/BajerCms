<template>

    <div class="table-responsive">
        <div class="d-flex flex-row-reverse mx-auto" style="padding-bottom: 1em;">
            <div class="p-2">
                <a class="btn btn-success text-white" v-b-modal="'addUser'"><i class="fa fa-plus"></i> Dodaj </a>
            </div>
            <div class="p-2">
                <div class="input-group add-on">
                    <input class="form-control" placeholder="Szukaj..." id="SearchBox" type="text" v-model="search">
                    <div class="input-group-btn">
                        <button class="btn btn-dark" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>#</th>
                <th v-for="column in columns">{{column}} <a href="#" class="pull-right" v-on:click.stop.prevent="sortBy(column)" ><i class="fa fa-sort" ></i></a>  </th>
                <th ><i class="fa fa-gear"></i> </th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>#</th>
                <th v-for="column in columns">{{column}} <a href="#" class="pull-right" v-on:click.stop.prevent="sortBy(column)" ><i class="fa fa-sort" ></i></a>  </th>
                <th><i class="fa fa-gear"></i> </th>
            </tr>
            </tfoot>
            <tbody>
            <tr v-for="(item, index) in filteredItems" :key="item.id">
                <td>{{index+1}}</td>
                <td>{{item.name}}</td>
                <td>{{item.email}}</td>
                <td><span class="badge-roles badge-info" v-for="role in item.roles">{{role.name}}</span> </td>
                <td>{{item.created_at}}</td>
                <td>
                    <button class="btn btn-outline-primary" title="edytuj"><i class="fa fa-edit fa-lg"></i></button>&nbsp;
                    <button class="btn btn-outline-danger" title="usuń" v-b-modal="'deleteUser'"><i class="fa fa-trash fa-lg"></i></button>
                </td>
            </tr>

            </tbody>
        </table>
        <add-user></add-user>
        <delete-user></delete-user>
        <b-pagination size="md" :total-rows="10" v-model="currentPage" :per-page="10">
        </b-pagination>
    </div>

</template>

<script>
    import SearchBox from './SearchBox.vue'
    import AddUser from  './AddUser.vue'
    import DeleteUser from  './deleteUser.vue'
    export default {
        name: 'dataTable',
        components: { SearchBox, AddUser, DeleteUser},
        data: function () {
            return {
                sortKey: 'name',
                reverse: false,
                search: '',
                currentPage: 1,
                visibleItems: []
            }
        },
        props: ['items','columns'],
        computed: {
            filteredItems: function(){
                return this.items.filter(item => {
                    return item.name.match(this.search);
                })
            },

        },
        methods:{
            sortBy: function(sortKey) {
                this.items = (this.sortKey == sortKey) ? ! this.items : false;

                this.sortKey = sortKey;
            },

        }

    }
</script>
<style>
    .badge-roles{
        border-radius: 2px;
        margin: 0px 5px;
        padding: 2px;
        text-align: center;
}
</style>
