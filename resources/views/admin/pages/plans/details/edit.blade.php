@extends('adminlte::page')

@section('title', "Editar o detalhe do plano: {$plan->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->id) }}">{{$plan->name}}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.details.show', [$plan->id,$detail->id]) }}">Detalhe</a></li>
        <li class="breadcrumb-item active" class="active"><a href="{{ route('plans.details.edit', [$plan->id, $detail->id]) }}">Editar</a></li>
    </ol>

    <h1>Editar o detalhe do plano <strong>#{{$plan->name}}</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('plans.details.update', [$plan->id, $detail->id]) }}" method="POST">
                <div class="form-group">
                    @method('PUT')
                    @include('admin.pages.plans.details._partials.form')
                    <button type="submit" class="btn btn-dark btn-sm">Atualizar <i class="fas fa-edit fa-flip-horizontal" style="color: #2e4b57;"></i></button>
                 </div>
            </form>
        </div>
    </div>
@stop