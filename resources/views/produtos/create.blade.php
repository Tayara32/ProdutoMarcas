@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <h4>Criar Nova Marca</h4>
        <form action="{{route('produtos.store')}}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="descricao">Descrição:</label>
                    <input type="text" class="form-control" id="descricao" name="descricao" >
                </div>
                <div class="form-group col-md-6">
                    <label for="marca_id">Selecione a marca deste produto</label>
                    <select class="form-control" name="marca_id" required>
                    @foreach($marcas as $marca)
                        <option value="{{$marca->id}}">
                            {{$marca->nome}}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="preco">Preço:</label>
                    <input type="text" class="form-control" id="preco" name="preco" >
                </div>
                <div class="form-group col-md-4">
                    <label for="cor">Cor:</label>
                    <input type="text" class="form-control" id="cor" name="cor" >
                </div>
                <div class="form-group col-md-2">
                    <label for="peso">Peso:</label>
                    <input type="text" class="form-control" id="peso" name="peso" >
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Criar</button>
            <a href="{{route('produtos.index')}}" class="btn btn-primary">Voltar</a>
        </form>


    </div>

@endsection
