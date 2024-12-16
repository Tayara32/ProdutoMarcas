@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <form action="{{route('marcas.create')}}" method="GET">

            <button type="submit" class="btn btn-primary">Criar Nova Marca</button>
        </form>

        @if(Session::has('mensagem'))
            <div class="alert alert-{{ Session::get('mensagem')['type'] }} alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="text-center">
                    {{ Session::get('mensagem')['msg'] }}
                </div>
            </div>
        @endif

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
