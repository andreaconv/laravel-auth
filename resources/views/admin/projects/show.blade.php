@extends('layouts.app')

@section('content')

<div class="container">

  <h2 class=" my-2">
    Titolo Progetto
  </h2>
  <h3>{{ $project->name }}</h3>

  <h2 class=" my-2">
    Data creazione
  </h2>
  <h3>{{ $data_formatted }}</h3>

  <h2 class=" my-2">
    Descrizione
  </h2>
  <p>{!! $project->text !!}</p>

  <a class="btn btn-primary" href="{{ route('admin.project.index') }}">Torna</a>

</div>

@endsection