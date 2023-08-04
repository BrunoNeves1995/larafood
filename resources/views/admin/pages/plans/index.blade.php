@extends('adminlte::page')

@section('title', 'planos')

@section('content_header')
    <h1>Planos <a href="{{ route('plans.create')}}" class="btn btn-dark btn-sm">Adicionar</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            #filtros
        </div>
        <div class="card-body">
            <table class="table ">
                <tr class="table table-dark">
                    <th>Nome</th>
                    <th>Preço</th>
                    <th width="30">Ações</th>
                </tr>
                <tbody>
                    @foreach ($plans as $plan)
                        <tr>
                            <th>{{$plan->name}}</th>
                            <th>R$ {{number_format($plan->price, 2, ',', '.')}}</th>
                            <th><a href="{{ route('plans.show', $plan->id)}}" class="btn btn-warning btn-sm">Detalhes</a></th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card--footer">
            {!! $plans->links() !!}
        </div>
    </div>
@stop