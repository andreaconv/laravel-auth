@extends('layouts.app')

@section('content')

<div class="container">

  @if ($errors->any())
    <div class="alert alert-danger" role="alert">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <h1>{{ $title }}</h1>

  <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('{{ $method }}')

    <div class="row">

      <div class="mb-3 col-5">
        <label for="name" class="form-label">Nome Progetto</label>
        <input
          type="text"
          class="form-control @error('name') is-invalid @enderror"
          value="{{ old('name') }}"
          placeholder="Nome Progetto"
          id="name"
          name="name">

          @error('name')
            <p class="text-danger">{{ $message }}</p>
          @enderror
      </div>

      <div class="mb-3 col-5">
        <label for="category" class="form-label">Categoria</label>
        <input
          type="text"
          class="form-control @error('category') is-invalid @enderror"
          value="{{ old('category') }}"
          placeholder="Categoria"
          id="category"
          name="category">

          @error('category')
            <p class="text-danger">{{ $message }}</p>
          @enderror
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

    <div class="row">

      <div class="mb-3 col-9">
        <label for="image" class="form-label">Immagine</label>
        <input
          onchange="showimage(event)"
          type="file"
          class="form-control"
          name="image"
          id="image">
      </div>
      <div class="col-3">
        <img class="image w-100" id="prev-image" src="" alt="">
      </div>
    </div>


      <div class="mb-3">
        <label for="descrizione" class="form-label">Descrizione</label>
        <textarea
          name="description"
          id="description"
          {{-- FIXME: non accetta le classi da quando ho inserito il CK EDITOR --}}
          class="form-control @error('category') is-invalid @enderror"
          placeholder="Descrizione"
          cols="30"
          rows="10">{{ old('description') }}</textarea>

          @error('description')
            <p class="text-danger">{{ $message }}</p>
          @enderror
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>

    </form>

</div>

<script>
  ClassicEditor
    .create( document.querySelector( '#description' ) )
    .catch( error => {
      console.error( error );
    });

    function showimage(event){
      const tagImage = document.getElementById('prev-image');
      tagImage.src = URL.createObjectURL(event.target.files[0]);
    }
</script>

@endsection