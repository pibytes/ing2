@extends('layouts.auth')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <span>Lista de administradores:</span>
          {{-- Agregar --}}
          <a href="{{url('register/admin')}}" class="btn btn-primary btn-sm btn-icon">
            Crear administrador
          </a>
        </div>
        <div class="card-body"> 
          
          {{--Exito--}}
          @if ( session('mensaje') )
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{session('mensaje')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
          @endif
          
          <table class="table table-striped table-hover">
            <thead>
              <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre</th>
              <th scope="col">DNI</th>
              <th scope="col">Email</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($admins as $item)
              <tr>
                {{-- ID --}}
                <th scope="row">{{ $item->id }}</th>
                {{-- Titulo y link --}}
                <td>
                  <a href="{{url("admin/admins/{$item->id}")}}">
                      {{ $item->name }}
                  </a>
                </td>
                <td>
                  {{ $item->dni }}
                </td>
                <td>
                  {{ $item->email }}
                </td>
                {{-- Acciones --}}
                <td>
                  <a href="{{url("admin/admins/{$item->id}/editar")}}" class="btn btn-primary btn-sm">
                    editar
                  </a>
                  <form action="{{url("admin/admins/{$item->id}")}}" class="d-inline" method="POST"
                    onclick="return confirm('Estas seguro que queres eliminar el administrador?')">
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
        {{-- fin card body --}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection