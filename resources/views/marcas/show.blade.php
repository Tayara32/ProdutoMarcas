@extends('layouts.master')

@section('content')
    <div class="container-fluid">

        <h4>Marca: {{$marca->nome}}</h4>



        <a href="{{ route('marcas.index') }}" class="btn btn-primary">Voltar</a>

    </div>

@endsection
