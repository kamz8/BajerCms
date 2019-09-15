<template>
  <div class="table-root">
    <template v-if="getUxMessage.length">
      <b-alert
        :variant="getUxMessage.status"
        :show="showAlert"
      >
        {{ getUxMessage.message }}
      </b-alert>
      <div class="clearfix" />
    </template>
    <div class="table-responsive">
      <div
        class="d-flex flex-row-reverse flex-sm-wrap mx-auto"
        style="padding-bottom: 1em;"
      >
        <div class="d-flex p-2">
          <a
            v-b-modal="'addUser'"
            class="btn btn-success text-white"
          ><i class="fa fa-plus" /> Dodaj </a>
        </div>
        <div class="flex-sm-column p-2">
          <div class="input-group add-on">
            <input
              id="SearchBox"
              v-model="search"
              class="form-control"
              placeholder="Szukaj..."
              type="text"
            >
            <div class="input-group-btn">
              <button
                class="btn btn-dark"
                type="submit"
              >
                <i class="fa fa-search" />
              </button>
            </div>
          </div>
        </div>
        <div class="d-flex p-2 align-self-start">
          <select
            v-model="limit"
            class="form-control"
          >
            <option value="10">
              10
            </option>
            <option value="25">
              25
            </option>
            <option value="50">
              50
            </option>
            <option value="100">
              100
            </option>
            <option :value="items.length">
              wszystko
            </option>
          </select>
        </div>
      </div>

      <table
        id="dataTable"
        class="table table-bordered text-center"
        width="100%"
        cellspacing="0"
      >
        <thead>
          <tr>
            <th>#</th>
            <th
              v-for="(column, key) in columns"
              :key="key"
              @click.prevent="sortBy(key)"
            >
              {{ column }} <a
                href="#"
                class="pull-right"
              ><i
                class="fa "
                :class="sortByToggle(key)"
              /></a>
            </th>
            <th><i class="fa fa-gear" /> </th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>#</th>
            <th
              v-for="(column, index) in columns"
              :key="index"
              @click.stop="sortBy(column)"
            >
              {{ column }} <a
                href="#"
                class="pull-right"
              ><i class="fa fa-sort" /></a>
            </th>
            <th><i class="fa fa-gear" /> </th>
          </tr>
        </tfoot>
        <tbody>
          <tr
            v-for="(item, index) in filteredItems"
            :key="item.id"
          >
            <td>{{ index+1 }}</td>
            <td>{{ item.name }}</td>
            <td>{{ item.email }}</td>
            <td>
              <span
                v-for="(role, roleIndex) in item.roles"
                :key="roleIndex"
                class="badge-roles badge-info"
              >{{ role.name }}</span>
            </td>
            <td>{{ item.created_at }}</td>
            <td>
              <button
                v-b-modal="'editUser'"
                class="btn btn-outline-primary"
                title="edytuj"
                @click="setSelectionUser(item.id)"
              >
                <i class="fa fa-edit fa-lg" />
              </button>&nbsp;
              <button
                v-b-modal="'deleteUser'"
                class="btn btn-outline-danger"
                title="usuń"
                @click="setSelectionUser(item.id)"
              >
                <i class="fa fa-trash fa-lg" />
              </button>
            </td>
          </tr>
          <tr v-if="!filteredItems.length ">
            <td
              class="text-center info"
              colspan="6"
            >
              Brak dopasowań
            </td>
          </tr>
        </tbody>
      </table>
      <b-pagination
        v-model="currentPage"
        size="md"
        :total-rows="totalRows"
        :per-page="limit"
      />
      <!--add dynamic component-->
      <add-user />
      <delete-user :id="userSelectedId" />
      <update-user :id="userSelectedId" />
    </div>
  </div>
</template>

<script>
import _ from 'lodash';
import AddUser from './AddUser.vue';
import DeleteUser from './DeleteUser.vue';
import UpdateUser from './UpdateUser';

export default {
  name: 'DataTable',
  components: {
    UpdateUser,
    AddUser,
    DeleteUser,
  },
  props: ['items', 'columns'],
  data() {
    return {
      sortKey: '',
      reverse: null,
      direction: '',
      search: '',
      currentPage: 1,
      limit: 10,
      userSelectedId: null,
      alertShow: false,
    };
  },
  computed: {
    filteredItems() {
      let index = 0;
      let searchResults = this.getUsers.filter((item) => item.name.match(this.search));
      console.log(this.direction);
      searchResults = _.orderBy(searchResults, this.sortKey, this.direction);
      if (this.currentPage > 1) index = (this.currentPage - 1) * parseInt(this.limit, 10);
      return searchResults.slice(index, index + parseInt(this.limit, 10));
    },
    totalRows() {
      return this.filteredItems.length;
    },
    getUsers() {
      return this.$store.state.users;
    },
    getUxMessage() {
      return this.$store.state.uxMessage;
    },

  },
  created() {
    this.$store.state.users = this.items;
  },
  methods: {
    sortBy(sortKey) {
      console.log(sortKey);
      this.reverse = (this.sortKey === sortKey) ? !this.reverse : false;
      this.sortKey = sortKey;
    },
    // reverse : true - asc | false - desc
    sortByToggle(sortKey) {
      if (this.sortKey === sortKey && this.reverse) {
        this.direction = 'desc';
        return 'fa-sort-asc';
      }
      if (this.sortKey !== sortKey || this.reverse === null) {
        return 'fa-sort';
      }

      this.direction = 'asc';
      return 'fa-sort-desc';
    },
    totalPages() {
      return Math.ceil(this.totalRows / this.limit);
    },
    setSelectionUser(id) {
      this.userSelectedId = id;
    },
    showAlert() {
      return !!this.getUxMessage.length;
    },

  },

};
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
