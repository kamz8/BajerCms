<template>
    <div class="table-responsive">
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
            @foreach($users as $user)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>@foreach ($user->roles as $role)
                    {{$role->name}}
                    @endforeach
                </td>
                <td>{{ $users->last()->created_at->diffForHumans()}}</td>
                <td>
                    <button class="btn btn-outline-primary"><i class="fa fa-edit fa-lg"></i> Edytuj</button>&nbsp;
                    <button class="btn btn-outline-danger"><i class="fa fa-trash fa-lg"></i>Usuń</button>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>
</template>

<script>
    export default {

    }
</script>
