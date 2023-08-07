@extends('adminlte::page')

@section('title', 'Cadastrar Nova Permissão')

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Permissão</a></li>
    <li class="breadcrumb-item active" class="active"><a href="{{ route('permissions.create') }}">Novo</a></li>
</ol>
    <h1>Cadastrar Nova Permissão</h1>
@stop
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('permissions.store')}}" class="form" method="POST">
                @csrf
                @include('admin.pages.permissions._partials.form')
                <div class="form-group">
                   <button type="submit" class="btn btn-dark btn-sm">Cadastrar <i class="fas fa-plus fa-flip-horizontal" style="color: #2e4b57;"></i></button>
                </div>
            </form>
        </div>
    </div>
@endsection