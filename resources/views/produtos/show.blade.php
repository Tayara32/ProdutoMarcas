@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <h4>Detalhes do Produto</h4>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" id="descricao" value="{{ $produto->descricao }}" readonly>
            </div>
            <div class="form-group col-md-6">
                <label for="marca">Marca</label>
                <input type="text" class="form-control" id="marca" value="{{ $produto->marca->nome }}" readonly>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="preco">Preço</label>
                <input type="text" class="form-control" id="preco" value="{{ $produto->preco }}" readonly>
            </div>
            <div class="form-group col-md-4">
                <label for="cor">Cor</label>
                <input type="text" class="form-control" id="cor" value="{{ $produto->cor }}" readonly>
            </div>
            <div class="form-group col-md-2">
                <label for="peso">Peso</label>
                <input type="text" class="form-control" id="peso" value="{{ $produto->peso }}" readonly>
            </div>
        </div>


        <a href="{{ route('produtos.index') }}" class="btn btn-primary">Voltar</a>
    </div>
@endsection

