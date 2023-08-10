@extends('adminlte::page')

@section('title', "Perfis disponíveis para o plano {$plan->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('profiles.index') }}">Perfis</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.profiles.index', $plan->id) }}">Planos</a></li>
        <li class="breadcrumb-item active" class="active"><a href="{{ route('plans.profiles.create', $plan->id) }}">Desponiveis</a></li>
    </ol>
    <h1>Permissões Disponiveis Para Plano: <strong>#{{ $plan->name }}{{-- </strong> <a href="{{ route('profiles.permissions.available', $profile->id)}}" class="btn btn-dark btn-sm" >Adicionar <i class="fas fa-plus fa-flip-horizontal" style="color: #2e4b57;"></i></a></h1> --}}
@endsection

        @section('content')
        {{-- <form action="{{ route('plans.profiles.search', $profile->id) }}" method="POST" class="form form-inline">
            @csrf
            <input style="width:300px" type="text" name="filter" placeholder="Nome" class="form-control" value="{{$filters['filter'] ?? '' }}">
            <button type="submit" class="btn btn-dark">Filtrar <i class="fas fa-filter fa-flip-horizontal" style="color: #2e4b57;"></i></button>
        </form> --}}
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
                            <form action="{{ route('plans.profiles.store', $plan->id) }}" method="post">
                                @csrf
                                @foreach ($profiles as $profile)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="profiles[]" value="{{ $profile->id }}">
                                        </td>
                                        <td>
                                            {{ $profile->name }}
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
                            {!! $profiles->appends($filters)->links() !!}
                        @else
                            {!! $profiles->links() !!}
                        @endif
                    </div>
                </div>
            </div>
        @endsection
