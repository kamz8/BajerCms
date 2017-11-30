<template>

    <div class="table-responsive">
        <div class="d-flex flex-row-reverse mx-auto" style="padding-bottom: 1em;">
            <div class="p-2">
                <a class="btn btn-success text-white"><i class="fa fa-plus"></i> Dodaj </a>
            </div>
        </div>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>#</th>
                <th>Nazwa</th>
                <th>Email</th>
                <th>Rola</th>
                <th>Utworzono</th>
                <th><i class="fa fa-gear"></i> </th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>#</th>
                <th>Nazwa</th>
                <th>Email</th>
                <th>Rola</th>
                <th>Utworzono</th>
                <th><i class="fa fa-gear"></i> </th>
            </tr>
            </tfoot>
            <tbody>
            <tr v-for="item in items" :key="item.id">
                <td>{{item.id}}</td>
                <td>{{item.name}}</td>
                <td>{{item.email}}</td>
                <td >{{item.roles.name}}</td>
                <td>{{item.created_at}}</td>
                <td>
                    <button class="btn btn-outline-primary" title="edytuj"><i class="fa fa-edit fa-lg"></i></button>&nbsp;
                    <button class="btn btn-outline-danger" title="usuń"><i class="fa fa-trash fa-lg"></i></button>
                </td>
            </tr>

            </tbody>
        </table>
    </div>
    </div>
</template>

<script>
    export default {
        props: ['items']

    }
</script>
