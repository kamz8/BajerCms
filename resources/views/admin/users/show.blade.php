@extends('admin.master')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Kokpit</a>
        </li>
        <li class="breadcrumb-item active">Urzytkownicy</li>
    </ol>
    <!-- User CRUD DataTables Card-->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> Urzytkowicy</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-sortable" width="100%" cellspacing="0">
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
                            <button class="btn btn-outline-primary"><i class="fa fa-edit fa-lg"></i>n&nbsp;Edytuj</button>
                            <button class="btn btn-outline-danger"><i class="fa fa-trash fa-lg"></i>&nbsp;Usuń</button>
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Ostatnia edycja {{$users->last()->updated_at->diffForHumans()}}</div>
    </div>
@endsection
