@extends('adminlte::page')

@section('title', "Detalhes do Plano  $plan->name")

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
    <li class="breadcrumb-item active" class="active"><a href="{{ route('plans.show', $plan->id) }}">Detalhes</a></li>
</ol>
    <h1>Detalhes do Plano <b>#{{ $plan->name}}</b></h1>
@stop
@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table">
                <tr class="table-dark">
                    <th>Nome</th>
                    <th>Url</th>
                    <th>Preço</th>
                    <th>Descrição</th>
                </tr>
                <tbody>
                        <tr>
                            <th>{{$plan->name}}</th>
                            <th>{{$plan->url}}</th>
                            <th>R$ {{number_format($plan->price, 2, ',', '.')}}</th>
                            <th>{{$plan->description}}</th>
                        </tr>
                </tbody>
            </table>

            @include('admin.includes.alert')
            
            <form action="{{route('plans.destroy', $plan->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button style="width: 100" type="submit" class="btn btn-dark btn-sm">DELETAR O PLANO <i class="fas fa-trash fa-flip-horizontal" style="color: #2e4b57;"></i></button>
            </form>
        </div>
    </div>
@endsection