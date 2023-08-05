@extends('adminlte::page')

@section('title', 'Cadastrar Novo Plano')

@section('content_header')
    <h1>Cadastrar Novo Plano</h1>
@stop
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('plans.store')}}" class="form" method="POST">
                @csrf
                @include('admin.pages.plans._partials.form')
                <div class="form-group">
                   <button type="submit" class="btn btn-dark btn-sm">Cadastrar <i class="fas fa-plus fa-flip-horizontal" style="color: #2e4b57;"></i></button>
                </div>
            </form>
        </div>
    </div>
@endsection