@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <h4>Editar Marca</h4>
        <form action="{{route('marcas.update', $marca->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <input type="text" class="form-control" id="nome" name="nome" value="{{ $marca->nome }}">
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
            <a href="{{ route('marcas.index') }}" class="btn btn-primary">Voltar</a>
        </form>

    </div>

@endsection
