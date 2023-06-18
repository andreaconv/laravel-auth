@extends('layouts.app')

@section('content')

<div class="container">

  <h1>form nuovo progetto</h1>

  <form action="{{ route('admin.project.store') }}" method="POST">
    @csrf

    <div class="row">

      <div class="mb-3 col-5">
        <label for="name" class="form-label">Nome Progetto</label>
        <input
          type="text"
          class="form-control"
          value="{{ old('name') }}"
          placeholder="Nome Progetto"
          id="name"
          name="name">
      </div>

      <div class="mb-3 col-5">
        <label for="category" class="form-label">Categoria</label>
        <input
          type="text"
          class="form-control"
          value="{{ old('category') }}"
          placeholder="Categoria"
          id="category"
          name="category">
      </div>

      <div class="mb-3 col-2">
        <label for="date_creation" class="form-label">Data di Creazione</label>
        <input
          type="date"
          class="form-control"
          name="date_creation"
          id="date_creation"
          value="{{ old('date_creation') }}"
          placeholder="Data di creazione">
      </div>

    </div>

      <div class="mb-3">
        <label for="descrizione" class="form-label">Descrizione</label>
        <textarea
          name="description"
          id="description"
          class="form-control"
          placeholder="Descrizione"
          cols="30"
          rows="10">{{ old('description') }}</textarea>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>

    </form>

</div>

@endsection
