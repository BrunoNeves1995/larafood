@extends('adminlte::page')

@section('title', "Adicionar um novo detalhe ao plano: {$plan->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->id) }}">{{$plan->name}}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.details.index', [$plan->id]) }}">Detalhes</a></li>
        <li class="breadcrumb-item active" class="active"><a href="{{ route('plans.details.create', [$plan->id]) }}">novo</a></li>
    </ol>

    <h1>Detalhes do Planos <strong>#{{$plan->name}}</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('plans.details.store', $plan->id) }}" method="POST">
                <div class="form-group">
                    @include('admin.pages.plans.details._partials.form')
                    <button type="submit" class="btn btn-dark btn-sm">Cadastrar <i class="fas fa-plus fa-flip-horizontal" style="color: #2e4b57;"></i></button>
                 </div>
            </form>
        </div>
    </div>
@stop