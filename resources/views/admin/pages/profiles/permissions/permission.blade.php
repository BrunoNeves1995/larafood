@extends('adminlte::page')

@section('title', "Permissões do Perfil {$profile->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" class="active"><a href="{{ route('profiles.index') }}">Perfis</a></li>
        <li class="breadcrumb-item active" class="active"><a href="{{ route('profiles.permissions.index', $profile->id) }}">Permissões</a></li>
    </ol>

    <h1>Permissões do Perfil <strong>#{{$profile->name}}</strong></h1>
    <a href="{{ route('profiles.permissions.create', $profile->id)}}" class="btn btn-dark btn-sm" >Adicionar Nova Permissão <i class="fas fa-plus fa-flip-horizontal" style="color: #2e4b57;"></i></a>
    @stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('profiles.search') }}" method="POST" class="form form-inline">
                @csrf
                <input style="width:300px" type="text" name="filter" placeholder="Nome" class="form-control" value="{{$filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Filtrar <i class="fas fa-filter fa-flip-horizontal" style="color: #2e4b57;"></i></button>
            </form>
        </div>
        <div class="card-body">
            <table  class="table">
                <thead class="table-active">
                    <tr>
                        <th>Nome</th>
                        <th width=129>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <th>{{$permission->name}}</th>
                            <th >
                                <a href="{{ route('profiles.permissions.detach', [$profile->id, $permission->id])}}" class="btn btn-dark btn-sm me-md-2">Desvincular <i class="fas fa-unlink fa-flip-horizontal" style="color: #2e4b57"></i></a>
                                {{-- <a href="{{ route('profiles.permissions.index', $profile->id)}}" class="btn btn-info btn-sm me-md-2"><i class="fas fa-user-lock fa-flip-horizontal"></i></a> --}}
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