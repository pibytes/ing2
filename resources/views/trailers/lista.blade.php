@extends('layouts.auth')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <span>Lista de Tráilers: </span>
          {{-- Agregar --}}
          <a href="{{route('trailers.createWithBook', "no_book")}}" class="btn btn-primary btn-sm btn-icon">
            Agregar Trailer
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
          @if(count($trailers) == 0)
            No existen trailers cargados en el sistema.
          @else
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                
                <th scope="col">Título</th>
                <th scope="col">Libro</th>
                <th scope="col">Pdf</th>
                @if (session('editar'))
                  <th scope="col">Acción</th>
                @endif
                </tr>
              </thead>
              <tbody>
                @foreach ($trailers as $item)
                <tr>
                  {{-- Titulo y link --}}
                  <td>
                    <a href="{{route('trailers.show',$item)}}"> {{--Tengo que pasar como parametro el item --}}
                        {{ $item -> titulo }}
                    </a>
                  </td>
                  {{-- Libro --}}
                  <td>
                    @if ($item -> libro)
                      <a href="{{route("libros.show", $item)}}">
                        {{$item -> libro -> titulo}}
                      </a>
                    @else
                      No tiene libro asignado
                    @endif
                  </td>
                  {{-- PDF --}}
                  {{-- 
                  <img style="height: 70px; border-radius: 10%;" src="{{url($item -> pdf)}}">
                  <iframe src="{{url($item -> pdf)}}#toolbar=0&navpanes=0&scrollbar=0" width="50" height="100"></iframe>
                  --}}
                  <td>
                    <a href="{{route('trailers.showTrailerAdmin',$item)}}">
                      <img style="height: 150px; border-radius: 10%;"
                        data-pdf-thumbnail-file="{{url($item -> pdf)}}" 
                        src="js\pdfThumbnails\pdf.png">
                    </a>
                  </td>
                  {{-- Acciones --}}
                  @if (session('editar'))
                    <td>
                      {{-- Edit --}}
                      <a href="{{route('trailers.edit', $item)}}" class="btn btn-primary btn-sm">
                        editar
                      </a>
                      {{-- Delete --}}
                      <form action="{{route('trailers.destroy', $item)}}" class="d-inline" method="POST"
                      onclick="return confirm('Estas seguro que queres eliminar el Tráiler?')">
                          @method('DELETE')
                          @csrf
                          <button type="submit" class="btn btn-danger btn-sm">
                            eliminar
                          </button>
                      </form>
                    </td>
                  @endif
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="row d-flex justify-content-center">
              {{$trailers->links()}}
            </div>
          @endif
        {{-- fin card body --}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection