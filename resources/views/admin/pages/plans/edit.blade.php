@extends('adminlte::page')

@section('title', "Editar o Plano {$plan->name}")

@section('content_header')
    <h1>Editar o Plano <strong>#{{$plan->name}}</strong></h1>
@stop
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('plans.update', $plan->id )}}" class="form" method="POST">
                @csrf
                @method('PUT')
                @include('admin.pages.plans._partials.form')
                <div class="form-group">
                   <button type="submit" class="btn btn-dark btn-sm">Atualizar <i class="fas fa-edit fa-flip-horizontal" style="color: #2e4b57;"></i></button>
                </div>
            </form>
        </div>
    </div>
@endsection