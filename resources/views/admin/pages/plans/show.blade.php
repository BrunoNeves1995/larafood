@extends('adminlte::page')

@section('title', "Detalhes do Plano  $plan->name")

@section('content_header')
    <h1>Detalhes do Plano <b>#{{ $plan->name}}</b></h1>
@stop
@section('content')
    <div class="card">
        <div class="card-body">
            {{-- <ul>
                <li>
                    <strong>Nome:</strong> {{ $plan->name}}
                </li>
                <li>
                    <strong>Url:</strong> {{$plan->url}}
                </li>
                <li>
                    <strong>Preço:</strong> {{ number_format($plan->price, 2, ',', '.')}}
                </li>
                <li>
                    <strong>Descrição:</strong> {{$plan->description}}
                </li>
            </ul> --}}
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
            <form action="{{route('plans.destroy', $plan->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button style="width: 100" type="submit" class="btn btn-danger btn-sm">DELETAR O PLANO <i class="fas fa-trash fa-flip-horizontal" style="color: #ca4343;"></i></button>
            </form>
        </div>
    </div>
@endsection