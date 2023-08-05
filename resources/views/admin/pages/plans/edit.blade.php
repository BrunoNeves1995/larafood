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
                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" name="name" class="form-control" placeholder="Nome:" value="{{$plan->name}}">
                </div>
                <div class="form-group">
                    <label>Preço:</label>
                    <input type="text" name="price" class="form-control" placeholder="Preço:" value="{{$plan->price}}">
                </div>
                <div class="form-group">
                    <label>Descrição:</label>
                    <input type="text" name="description" class="form-control" placeholder="Descrição:" value="{{$plan->description}}">
                </div>
                <div class="form-group">
                   <button type="submit" class="btn btn-dark btn-sm">Cadastrar <i class="fas fa-plus fa-flip-horizontal" style="color: #2e4b57;"></i></button>
                </div>
            </form>
        </div>
    </div>
@endsection