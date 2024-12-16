@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <h4>Editar produto</h4>
        <form action="{{route('produtos.update', $produto->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" id="descricao" name="descricao" value="{{$produto->descricao}}" >
                </div>
                <div class="form-group col-md-6">

                    <select class="form-control" name="marca_id" required>
                        @foreach($marcas as $marca)
                            <option value="{{$marca->id}}"
                                {{(isset($produto->marca_id) && $produto->marca_id == $marca->id ?'selected' : '')}}>{{$marca->nome}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" id="preco" name="preco"  value="{{$produto->preco}}" >
                </div>
                <div class="form-group col-md-4">
                    <input type="text" class="form-control" id="cor" name="cor"  value="{{$produto->cor}}" >
                </div>
                <div class="form-group col-md-2">
                    <input type="text" class="form-control" id="peso" name="peso"  value="{{$produto->peso}}" >
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
            <a href="{{ route('produtos.index') }}" class="btn btn-primary">Voltar</a>
        </form>
    </div>

@endsection
