@extends('adminlte::page')

@section('title', "Detalhes do Plano {$plan->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->id) }}">{{$plan->name}}</a></li>
        <li class="breadcrumb-item active" class="active"><a href="{{ route('plans.details.index', [$plan->id, $details['data'][0]['id']]) }}">Detalhes</a></li>
    </ol>

    <h1>Detalhes do Planos <strong>#{{$plan->name}}</strong> <a href="{{ route('plans.details.create', [$plan->id, $details['data'][0]['id']])}}" class="btn btn-dark btn-sm" >Adicionar <i class="fas fa-plus fa-flip-horizontal" style="color: #2e4b57;"></i></a></h1>
    @stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-dark table-hover">
                <tr>
                    <th>Nome</th>
                    <th width=160>Ações</th>
                </tr>
                <tbody>
                    @foreach ($plan->details as $detail)
                        <tr>
                            <th>{{$detail->name}}</th>
                            <th >
                                <a href="{{ route('plans.details.show', [$plan->id, $detail->id])}}" class="btn btn-secondary btn-sm me-md-2">Ver</a>
                                <a href="{{ route('plans.details.edit', [$plan->id, $detail->id])}}" class="btn btn-warning btn-sm me-md-2">Editar</a>
                              </th>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- Exibe a paginação --}}
        {{-- <div class="card--footer">
            @if (isset($filters))
                {!! $details->appends($filters)->links() !!}
            @else
                {!! $details->links() !!}
            @endif
        </div> --}}
    </div>
@stop