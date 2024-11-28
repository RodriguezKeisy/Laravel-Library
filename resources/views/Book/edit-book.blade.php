@extends('layout.main')

@section('page-title', 'Modifica Libro')

@section('header-title')
    Modifica Libro: {{ $book->title }}
@endsection

@section('header-content')
    Aggiorna le informazioni del libro nel modulo sottostante.
@endsection

@section('main-content')
    <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data" class="mt-4">
        @csrf
        @method('PUT')

        <!-- Titolo del libro -->
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" id="title" name="title"
                   class="form-control @error('title') is-invalid @enderror"
                   value="{{ old('title', $book->title) }}" >
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
                        {{ old('author_id', $book->author_id) == $author->id ? 'selected' : '' }}>
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
                        {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>
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
            <textarea id="description" name="description" rows="5"
                      class="form-control @error('description') is-invalid @enderror">{{ old('description', $book->description) }}</textarea>
            @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Numero di pagine del libro -->
        <div class="mb-3">
            <label for="pages" class="form-label">Numero di Pagine</label>
            <input type="number" id="pages" name="pages" class="form-control @error('pages') is-invalid @enderror"
                   value="{{ old('pages', $book->pages) }}" min="1" step="1">
            @error('pages')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Sezione Immagine e Input File -->
        <div class="mb-3 row">
            <div class="col-md-6">
                <label for="image" class="form-label">Immagine (Opzionale)</label>
                <input type="file" id="image" name="image"
                       class="form-control @error('image') is-invalid @enderror" accept="image/*">
                @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Colonna per l'immagine esistente -->
            <div class="col-md-6">
                @if($book->image)
                    <img src="{{ asset('img/books/'.$book->image) }}" alt="Immagine del libro" class="img-fluid" style="max-width: 150px; height: 200px;">
                @else
                    <p>Immagine non disponibile</p>
                @endif
            </div>
        </div>

        <!-- Bottoni per salvare o annullare -->
        <div class="d-flex justify-content-between">
            <a href="{{ route('home') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Annulla
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Salva Modifiche
            </button>
        </div>
    </form>
@endsection
