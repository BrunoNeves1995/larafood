@extends('adminlte::page')

@section('title', "Detalhes da Permissão  $permission->name")

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Permissão</a></li>
    <li class="breadcrumb-item active" class="active"><a href="{{ route('permissions.show', $permission->id) }}">Detalhes</a></li>
</ol>
    <h1>Detalhes da Permissão <b>#{{ $permission->name}}</b></h1>
@stop
@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table">
                <tr class="table-dark">
                    <th>Nome</th>
                    <th>Descrição</th>
                </tr>
                <tbody>
                        <tr>
                            <th>{{$permission->name}}</th>
                            <th>{{$permission->description}}</th>
                        </tr>
                </tbody>
            </table>

            @include('admin.includes.alert')
            
            <form action="{{route('permissions.destroy', $permission->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button style="width: 100" type="submit" class="btn btn-dark btn-sm">DELETAR O PLANO <i class="fas fa-trash fa-flip-horizontal" style="color: #2e4b57;"></i></button>
            </form>
        </div>
    </div>
@endsection