@extends('layouts.master')

@section('content')
    <h4>Produtos da marca: {{$marca->nome}}</h4>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Nome</th>
        <th scope="col">Mais Informações</th>
    </tr>
    </thead>
    <tbody>
    @foreach($marca->produtos as $marca)
        <tr>
            <td>{{$marca->descricao}}</td>
            <td><a href="{{route('produtos.show', $marca->id)}}">Detalhes do Produto</a></td>
        </tr>
    @endforeach

    </tbody>
</table>
@endsection
