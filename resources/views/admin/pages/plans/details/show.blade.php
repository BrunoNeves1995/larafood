@extends('adminlte::page')

@section('title', "Detalhe do Detalhes: {$detail->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->id) }}">{{$plan->name}}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.details.index', [$plan->id]) }}">Detalhes</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.details.edit', [$plan->id, $detail->id]) }}">Editar</a></li>
        <li class="breadcrumb-item active" class="active"><a href="{{ route('plans.details.show', [$plan->id, $detail->id]) }}">Detalhes</a></li>
    </ol>

    <h1>Detalhe do Detalhes <strong>#{{$detail->name}}</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table">
                <tr class="table-dark">
                    <th>Nome</th>
                </tr>
                <tbody>
                        <tr>
                            <th>{{$detail->name}}</th>
                        </tr>
                </tbody>
            </table>
            <form action="{{route('plans.details.destroy', [$plan->id, $detail->id])}}" method="POST">
                @csrf
                @method('DELETE')
                <button style="width: 100" type="submit" class="btn btn-dark btn-sm">DELETAR O DETALHE <i class="fas fa-trash fa-flip-horizontal" style="color: #2e4b57;"></i></button>
            </form>
        </div>
    </div>
@stop