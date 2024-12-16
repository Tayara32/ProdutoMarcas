@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <form action="{{route('produtos.create')}}" method="GET">

            <button type="submit" class="btn btn-primary">Criar Novo Produto</button>
        </form>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Descrição</th>
                <th scope="col">Preço</th>
                <th scope="col">Cor</th>
                <th scope="col">Peso</th>
                <th scope="col">Marca</th>
                <th scope="col">Ações</th>
            </tr>
            </thead>
            <tbody>

            @foreach($produtos as $produto)
                <tr>
                    <td>{{$produto->id}}</td>
                    <td>{{$produto->descricao}}</td>
                    <td>{{$produto->preco}}</td>
                    <td>{{$produto->cor}}</td>
                    <td>{{$produto->peso}}</td>
                    <td>{{$produto->marca->nome}}</td>
                    <td>
                        <a href="{{route('produtos.show', $produto->id)}}" class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{route('produtos.edit', $produto->id)}}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{route('produtos.destroy', $produto->id)}}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection
