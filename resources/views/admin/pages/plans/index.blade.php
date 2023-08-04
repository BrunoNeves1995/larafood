@extends('adminlte::page')

@section('title', 'planos')

@section('content_header')
    <h1>Planos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            #filtros
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th width="30">Ações</th>
                </tr>
                <tbody>
                    @foreach ($plans as $plan)
                        <tr>
                            <th>{{$plan->name}}</th>
                            <th>{{$plan->price}}</th>
                            <th><a href="" class="btn btn-warning">Detalhes</a></th>
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