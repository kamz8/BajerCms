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
    <div class="card mb-3" >
        <div class="card-header">
            <i class="fa fa-table"></i> Urzytkowicy</div>
        <div class="card-body">
            <data-table :items="{{$users}}" :columns="['Nazwa','Email','Rola','Utworzono']"></data-table>
        </div>
        <div class="card-footer small text-muted">Ostatnia edycja {{$users->last()->updated_at->diffForHumans()}}</div>
    </div>
@endsection
