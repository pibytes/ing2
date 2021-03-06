@extends('layouts.auth')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <span>Lista de Géneros:</span>
          {{-- Agregar --}}
          <a href="{{route('generos.create')}}" class="btn btn-primary btn-sm btn-icon">
            Agregar Género
          </a>
        </div>
        <div class="card-body"> 
          {{--Errores--}}
          @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {!! implode('', $errors->all('<div>:message</div>')) !!}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif
          
          {{--Exito--}}
          @if ( session('mensaje') )
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{session('mensaje')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
          @endif
          @if(count($generos) == 0)
            No existen generos cargados en el sistema.
          @else
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre </th>
                <th scope="col">Acción</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($generos as $item)
                <tr>
                  {{-- ID --}}
                  <th scope="row">{{ $item->id }}</th>
                  {{-- Titulo y link --}}
                  <td>
                    <a href="{{route('generos.show',$item)}}"> {{--Tengo que pasar como parametro el item --}}
                        {{ $item->nombre }}
                    </a>
                  </td>
                
                  {{-- Acciones --}}
                  <td>
                    {{-- Edit --}}
                    <a href="{{route('generos.edit', $item)}}" class="btn btn-primary btn-sm">
                      editar
                    </a>
                    {{-- Delete --}}
                    <form action="{{route('generos.destroy', $item)}}" class="d-inline" method="POST"
                    onclick="return confirm('Estas seguro que queres eliminar el género?')">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">
                          eliminar
                        </button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="row d-flex justify-content-center"> 
              {{$generos->links()}}
            </div>
          @endif
        {{-- fin card body --}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection