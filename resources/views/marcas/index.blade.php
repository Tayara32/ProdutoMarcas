@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <form action="{{route('marcas.create')}}" method="GET">

            <button type="submit" class="btn btn-primary">Criar Nova Marca</button>
        </form>

        <!-- Mensagem de Erro/Sucesso -->
        @if(Session::has('mensagem'))
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-warning">
                       <div class="text-center">
                           {{ Session::get('mensagem')['msg'] }}
                       </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Formulário de Busca -->
        <form action="{{ route('marcas.index') }}" method="GET" class="my-3">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="buscar" class="form-control" placeholder="Buscar por nome" value="{{ request('buscar') }}">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-success">Buscar</button>
                </div>
            </div>
        </form>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Produtos</th>
                <th scope="col">Ações</th>
           </tr>
            </thead>
            <tbody>

              @foreach($marcas as $marca)
                  <tr>
                  <td>{{$marca->id}}</td>
                  <td>{{$marca->nome}}</td>
                  <td><a href="{{route('marcas.produtos', $marca->id)}}">Listar Produtos</a></td>
                  <td>
                      <a href="{{ route('marcas.show', $marca->id) }}" class="btn btn-info btn-sm">
                          <i class="fas fa-eye"></i>
                      </a>
                      <a href="{{ route('marcas.edit', $marca->id) }}" class="btn btn-warning btn-sm">
                          <i class="fas fa-edit"></i>
                      </a>
                      <form action="{{ route('marcas.destroy', $marca->id) }}" method="POST" style="display:inline;">
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
        <div class="row">
            <div class="col d-flex justify-content-center">
                {{ $marcas->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
