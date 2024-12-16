@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <h4>Criar Nova Marca</h4>
    <form action="{{route('marcas.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" id="nome" name="nome" placeholder="nome da marca">
        </div>
        <button type="submit" class="btn btn-primary">Criar</button>
        <a href="{{ route('marcas.index') }}" class="btn btn-primary">Voltar</a>
    </form>


    </div>

@endsection
