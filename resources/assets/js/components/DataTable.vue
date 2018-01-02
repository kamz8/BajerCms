<template>
<div class="table-root">
    <template v-if="getUxMessage.length">
        <b-alert :variant="getUxMessage.status" :show="showAlert">{{getUxMessage.message}}</b-alert>
        <div class="clearfix"></div>
    </template>
    <div class="table-responsive">
        <div class="d-flex flex-row-reverse flex-sm-wrap mx-auto" style="padding-bottom: 1em;">
            <div class="d-flex p-2">
                <a class="btn btn-success text-white" v-b-modal="'addUser'"><i class="fa fa-plus"></i> Dodaj </a>
            </div>
            <div class="flex-sm-column p-2">
                <div class="input-group add-on">
                    <input class="form-control" placeholder="Szukaj..." id="SearchBox" type="text" v-model="search">
                    <div class="input-group-btn">
                        <button class="btn btn-dark" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
            <div class="d-flex p-2 align-self-start">
                <select class="form-control" v-model="limit">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                    <option :value="items.length">wszystko</option>
                </select>
            </div>
        </div>

        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>#</th>
                <th v-for="(column, key) in columns" v-on:click.prevent="sortBy(key)">{{column}} <a href="#" class="pull-right"  ><i class="fa " :class="sortByToggle(key)"></i></a>  </th>
                <th ><i class="fa fa-gear"></i> </th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>#</th>
                <th v-for="column in columns" v-on:click.stop="sortBy(column)">{{column}} <a href="#" class="pull-right"  ><i class="fa fa-sort" ></i></a>  </th>
                <th ><i class="fa fa-gear"></i> </th>
            </tr>
            </tfoot>
            <tbody>
            <tr v-for="(item, index) in filteredItems" :key="item.id" >
                <td>{{index+1}}</td>
                <td>{{item.name}}</td>
                <td>{{item.email}}</td>
                <td><span class="badge-roles badge-info" v-for="role in item.roles">{{role.name}}</span> </td>
                <td>{{item.created_at}}</td>
                <td>
                    <button class="btn btn-outline-primary" title="edytuj" v-on:click="setSelectionUser(item.id)" v-b-modal="'editUser'"><i class="fa fa-edit fa-lg"></i></button>&nbsp;
                    <button class="btn btn-outline-danger" title="usuń" v-on:click="setSelectionUser(item.id)" v-b-modal="'deleteUser'"><i class="fa fa-trash fa-lg"></i></button>
                </td>
            </tr>
            <tr v-if="!filteredItems.length ">
                <td class="text-center info" colspan="6">Brak dopasowań</td>
            </tr>

            </tbody>
        </table>
        <b-pagination size="md" :total-rows="totalRows" v-model="currentPage" :per-page="limit">
        </b-pagination>
        <!--add dynamic component-->
        <add-user></add-user>
        <delete-user :id="userSelectedId"></delete-user>
        <update-user :id="userSelectedId"></update-user>
    </div>
</div>


</template>

<script>
    import SearchBox from './SearchBox.vue'
    import AddUser from  './AddUser.vue'
    import DeleteUser from  './DeleteUser.vue'
    import _ from 'lodash'
    import UpdateUser from "./UpdateUser";

    export default {
        name: 'dataTable',
        components: {
            UpdateUser,
            SearchBox, AddUser, DeleteUser, _},
        data: function () {
            return {
                sortKey: '',
                reverse: null,
                direction: '',
                search: '',
                currentPage: 1,
                limit: 10,
                totalRows : this.items.length,
                userSelectedId: null,
                alertShow: false
            }
        },
        props: ['items','columns'],
        computed: {
            filteredItems: function(){
                let index = 0;
                let searchResults = this.getUsers.filter(item => {
                    return item.name.match(this.search);
                });
                console.log(this.direction);
                searchResults = _.orderBy(searchResults,this.sortKey, this.direction);
                this.totalRows = searchResults.length;
                if(this.currentPage > 1)
                    index = (this.currentPage -1) * parseInt(this.limit);
                    return searchResults.slice(index, index + parseInt(this.limit))
            },
            getUsers: function(){
                return this.$store.state.users;
            },
            getUxMessage: function () {
                return this.$store.state.uxMessage;
            },

        },
        methods:{
            sortBy: function(sortKey) {
                console.log(sortKey);
                this.reverse = (this.sortKey === sortKey) ? ! this.reverse : false;
                this.sortKey = sortKey;

            },
            // reverse : true - asc | false - desc
            sortByToggle: function(sortKey){
                if(this.sortKey === sortKey && this.reverse){
                    this.direction = 'desc';
                    return 'fa-sort-asc';
                }
                else if(this.sortKey !== sortKey || this.reverse === null){
                    return 'fa-sort';
                }
                else{
                    this.direction = 'asc';
                    return 'fa-sort-desc';
                }
            },
            totalPages: function() {
                return Math.ceil(this.totalRows / this.limit)
            },
            setSelectionUser: function (id) {
                this.userSelectedId = id;
            },
            showAlert(){
                if(this.getUxMessage.length)
                    return true;
            }

        },
        created: function(){
            this.$store.state.users = this.items
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
    .alert-wrapper{
        position: relative;

    }
    .alert-wrapper > .alert{
        position: absolute;
        top: 10%;
        right: 50px;
    }
    @media screen and (min-width: 320px) {
        #dataTable{
            font-size: 12px;
        }
    }
    @media screen and (min-width: 768px) {
        #dataTable{
            font-size: 14px;
        }
    }
    @media screen and (min-width: 1200px) {
        #dataTable{
            font-size: 16px;
        }
    }

</style>
