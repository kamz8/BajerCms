@extends('admin.master')
@section('content')

    <!-- User CRUD DataTables Card-->
    <div class="card mb-3" >
        <div class="card-header">
            <i class="fa fa-table"></i> Urzytkowicy</div>
        <div class="card-body">
            <data-table
                    :columns="[
                { name: 'nazwa' },
                { name: 'email' }
            ]"
                    :items="{{$users}}"></data-table>
        </div>
        <div class="card-footer small text-muted">Ostatnia edycja {{$users->last()->updated_at->diffForHumans()}}</div>
    </div>
@endsection
