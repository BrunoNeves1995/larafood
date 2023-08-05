@extends('adminlte::page')

@section('title', 'planos')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item" class="active"><a href="{{ route('plans.index') }}">Planos</a></li>
    </ol>

    <h1>Planos <a href="{{ route('plans.create')}}" class="btn btn-dark btn-sm" >Adicionar <i class="fas fa-plus fa-flip-horizontal" style="color: #2e4b57;"></i></a></h1>
    @stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('plans.search') }}" method="POST" class="form form-inline">
                @csrf
                <input style="width:300px" type="text" name="filter" placeholder="Nome" class="form-control" value="{{$filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Filtrar <i class="fas fa-filter fa-flip-horizontal" style="color: #2e4b57;"></i></button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-dark table-hover">
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th width=160>Ações</th>
                </tr>
                <tbody>
                    @foreach ($plans as $plan)
                        <tr>
                            <th>{{$plan->name}}</th>
                            <th>R$ {{number_format($plan->price, 2, ',', '.')}}</th>
                            <th >
                                <a href="{{ route('plans.show', $plan->id)}}" class="btn btn-warning btn-sm me-md-2">Detalhes</a>
                                <a href="{{ route('plans.edit', $plan->id)}}" class="btn btn-info btn-sm me-md-2">Alterar</a>
                              </th>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- Exibe a paginação --}}
        <div class="card--footer">
            @if (isset($filters))
                {!! $plans->appends('filters')->links() !!}
            @else
                {!! $plans->links() !!}
            @endif
        </div>
    </div>
@stop