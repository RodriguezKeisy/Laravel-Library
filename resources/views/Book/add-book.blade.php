@extends('layout.main')

@section('page-title', 'Aggiungi Libro')

@section('header-title')
    Aggiungi un Nuovo Libro
@endsection

@section('header-content')
    Compila il modulo sottostante per aggiungere un nuovo libro alla tua libreria.
@endsection

@section('main-content')
    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data" class="mt-4">
        @csrf

        <!-- Titolo del libro -->
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" id="title" name="title"
                   class="form-control @error('title') is-invalid @enderror"
                   value="{{ old('title') }}" >
            @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Autore del libro -->
        <div class="mb-3">
            <label for="author_id" class="form-label">Autore</label>
            <select id="author_id" name="author_id"
                    class="form-control @error('author_id') is-invalid @enderror" >
                <option value="" disabled>Seleziona un autore</option>
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}"
                        {{ old('author_id') == $author->id ? 'selected' : '' }}>
                        {{ $author->name }}
                    </option>
                @endforeach
            </select>
            @error('author_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Categoria del libro -->
        <div class="mb-3">
            <label for="category_id" class="form-label">Categoria</label>
            <select id="category_id" name="category_id"
                    class="form-control @error('category_id') is-invalid @enderror" >
                <option value="" disabled>Seleziona una categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Descrizione del libro -->
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea id="description" name="description" rows="4"
                      class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
        </div>

        <!-- Numero di pagine del libro -->
        <div class="mb-3">
            <label for="pages" class="form-label">Numero di Pagine</label>
            <input type="number" id="pages" name="pages" class="form-control @error('pages') is-invalid @enderror"
                   value="{{ old('pages') }}" min="1" step="1">
            @error('pages')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Immagine del libro -->
        <div class="mb-3">
            <label for="image" class="form-label">Immagine (Opzionale)</label>
            <input type="file" id="image" name="image"
                   class="form-control @error('image') is-invalid @enderror" accept="image/*">
            @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Bottoni per salvare o annullare -->
        <div class="d-flex justify-content-between">
            <a href="{{ route('home') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Annulla
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Salva Libro
            </button>

        </div>
    </form>
@endsection
