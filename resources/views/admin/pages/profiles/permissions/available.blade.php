@extends('adminlte::page')

@section('title', "Permissões do Perfil {$profile->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('profiles.index') }}">Perfis</a></li>
        <li class="breadcrumb-item"><a href="{{ route('profiles.permissions.index', $profile->id) }}">Permissões</a></li>
        <li class="breadcrumb-item active" class="active"><a href="{{ route('profiles.permissions.index', $profile->id) }}">Adicionar</a></li>
    </ol>
    <h1>Permissões Disponiveis Para Perfil: <strong>#{{ $profile->name }}{{-- </strong> <a href="{{ route('profiles.permissions.available', $profile->id)}}" class="btn btn-dark btn-sm" >Adicionar <i class="fas fa-plus fa-flip-horizontal" style="color: #2e4b57;"></i></a></h1> --}}
@endsection

        @section('content')
        <form action="{{ route('profiles.permissions.search', $profile->id) }}" method="POST" class="form form-inline">
            @csrf
            <input style="width:300px" type="text" name="filter" placeholder="Nome" class="form-control" value="{{$filters['filter'] ?? '' }}">
            <button type="submit" class="btn btn-dark">Filtrar <i class="fas fa-filter fa-flip-horizontal" style="color: #2e4b57;"></i></button>
        </form>
            <div class="card">
                <div class="card-body">
                    @include('admin.includes.alert')
                    <table  class="table">
                        <thead class="table-active">
                            <tr>
                                <th width="50px">#</th>
                                <th>Nome</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form action="{{ route('profiles.permissions.store', $profile->id) }}" method="post">
                                @csrf
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}">
                                        </td>
                                        <td>
                                            {{ $permission->name }}
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="500">
                                        <button type="submit" class="btn btn-dark btn-sm">Vincular <i class="fas fa-link" style="color: #2e4b57"> </i></button>
                                        
                                    </td>
                                </tr>
                            </form>
                        </tbody>
                    </table>
                    <div class="card--footer">
                        @if (isset($filters))
                            {!! $permissions->appends($filters)->links() !!}
                        @else
                            {!! $permissions->links() !!}
                        @endif
                    </div>
                </div>
            </div>
        @endsection
