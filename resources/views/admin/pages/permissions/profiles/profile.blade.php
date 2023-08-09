@extends('adminlte::page')

@section('title', "Perfis da permissão {$permission->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" class="active"><a href="{{ route('permissions.index') }}">Permissões</a></li>
        <li class="breadcrumb-item active" class="active"><a href="{{ route('permissions.profiles.index', $permission->id) }}">Perfis</a></li>
    </ol>

    <h1>Perfis que contem a permissão <strong>#{{$permission->name}}</strong></h1>
    {{-- <a href="{{ route('profiles.permissions.create', $profile->id)}}" class="btn btn-dark btn-sm" >Adicionar Nova Permissão <i class="fas fa-plus fa-flip-horizontal" style="color: #2e4b57;"></i></a> --}}
    @stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('permissions.profiles.search', $permission) }}" method="POST" class="form form-inline">
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
                    @foreach ($profiles as $profile)
                        <tr>
                            <th>{{$profile->name}}</th>
                            <th >
                                <a href="{{ route('permissions.profiles.detach', [$permission->id, $profile->id])}}" class="btn btn-dark btn-sm me-md-2">Desvincular <i class="fas fa-unlink fa-flip-horizontal" style="color: #2e4b57"></i></a>
                              </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- Exibe a paginação --}}
        <div class="card--footer">
            @if (isset($filters))
                {!! $profiles->appends($filters)->links() !!}
            @else
                {!! $profiles->links() !!}
            @endif
        </div>
    </div>
@stop