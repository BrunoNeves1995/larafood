@extends('adminlte::page')

@section('title', "Editar a Permissão {$permission->name}")

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Perfil</a></li>
    <li class="breadcrumb-item active" class="active"><a href="{{ route('permissions.edit', $permission->id) }}">Editar</a></li>
</ol>
    <h1>Editar a Permissão <strong>#{{$permission->name}}</strong></h1>
@stop
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('permissions.update', $permission->id )}}" class="form" method="POST">
                @method('PUT')
                @include('admin.pages.permissions._partials.form')
                <div class="form-group">
                   <button type="submit" class="btn btn-dark btn-sm">Atualizar <i class="fas fa-edit fa-flip-horizontal" style="color: #2e4b57;"></i></button>
                </div>
            </form>
        </div>
    </div>
@endsection