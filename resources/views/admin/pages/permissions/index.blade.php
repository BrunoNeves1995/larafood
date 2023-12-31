@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" class="active"><a href="{{ route('permissions.index') }}">Permissões</a></li>
    </ol>

    <h1>Permissões <a href="{{ route('permissions.create')}}" class="btn btn-dark btn-sm" >Adicionar <i class="fas fa-plus fa-flip-horizontal" style="color: #2e4b57;"></i></a></h1>
    @stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('permissions.search') }}" method="POST" class="form form-inline">
                @csrf
                <input style="width:300px" type="text" name="filter" placeholder="Nome" class="form-control" value="{{$filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Filtrar <i class="fas fa-filter fa-flip-horizontal" style="color: #2e4b57;"></i></button>
            </form>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="table-active">
                    <tr>
                        <th>Nome</th>
                        <th>Description</th>
                        <th width=156>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <th>{{$permission->name}}</th>
                            <th>{{$permission->description}}</th>
                            <th >
                                <a href="{{ route('permissions.show', $permission->id)}}" class="btn btn-secondary btn-sm me-md-2">Ver</a>
                                <a href="{{ route('permissions.edit', [$permission->id])}}" class="btn btn-warning btn-sm me-md-2">Editar</a>
                                <a href="{{ route('permissions.profiles.index', $permission->id)}}" class="btn btn-info btn-sm me-md-2"><i class="fas fa-user-lock fa-flip-horizontal"></i></a>
                              </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- Exibe a paginação --}}
        <div class="card--footer">
            @if (isset($filters))
                {!! $permissions->appends($filters)->links() !!}
            @else
                {!! $permissions->links() !!}
            @endif
        </div>
    </div>
@stop