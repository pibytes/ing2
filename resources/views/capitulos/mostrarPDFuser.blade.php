@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card bg-dark">
        <div class="card-header d-flex justify-content-between">
          <span class="p-2">
            {{$libro -> titulo}}
            @if ($libro->esPorCapitulos())
              - {{$capitulo->titulo}}
            @endif
            @if($leido)
              <svg class="bi bi-check-all text-primary" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14l.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z"/>
              </svg>
            @endif
          </span>
          <div class="col-5 d-flex">
            @if(!$leido)
            <a href="{{route('capitulo.marcarLeido', ['libro_id'=>$libro->id, 'id'=>$capitulo->id])}}" class= "btn btn-primary ml-auto" >
              Marcar como leido
            </a>
            @endif
            @if ($libro->esPorCapitulos())
              <a href="{{route('libro.capitulos', $libro->id)}}" class= "btn btn-secondary ml-auto" >
            @else
              <a href="{{route("libros.showForUser", $libro)}}" class= "btn btn-secondary ml-auto">
            @endif
              Volver
            </a>
          </div>
        </div>
        <div class="card-body">
          <embed src="{{url($capitulo -> pdf)}}#toolbar=0&navpanes=0&scrollbar=0" height="500" class= "w-100">
        </div>
    </div>
  </div>
</div>
@endsection