@extends('layouts.app')

@section('content')

<div class="container">


  <div class="d-inline">
    <h2 class=" my-2 d-inline">
      Titolo Progetto
    </h2>

    <a href="{{ route('admin.project.edit', $project) }}" class="btn btn-warning" title="Modifica">Modifica</a>
    @include('admin.partials.form-delete')
  </div>

  <h3>{{ $project->name }}</h3>

  <h2 class=" my-2">
    Data creazione
  </h2>
  <h3>{{ $data_formatted }}</h3>

  <div>
    <img class="image w-50" src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->name }}" onerror="this.src='/img/placeholder.jpg'">
  </div>

  {{-- FIXME: visualizza il nome dell'immagine --}}
  <p>{{  $project->image_original_name  }}</p>

  <h2 class=" my-2">
    Descrizione
  </h2>
  <p>{!! $project->description !!}</p>

  <a class="btn btn-primary" href="{{ route('admin.project.index') }}">Torna</a>

</div>

@endsection
