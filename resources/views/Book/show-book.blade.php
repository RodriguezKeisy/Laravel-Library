@extends('layout.main')

@section('title', 'Dettagli del Libro')

@section('header-title')
    {{ $book->title }}
@endsection

@section('header-content')
    <span class="text-muted">Aggiunto il: {{ $book->created_at->format('d/m/Y') }}</span>
    <small class="text-muted ms-2">{{ $book->created_at->format('H:i:s') }}</small>
@endsection

@section('main-content')
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <p><strong>Autore:</strong> <span class="text-primary">{{ $book->author->name }}</span></p>
                    <p><strong>Categoria:</strong> <span class="badge text-bg-secondary">{{ $book->category->name }}</span></p>
                    <p><strong>Numero di Pagine:</strong> <span class="text-muted">{{ $book->pages ?? 'Non specificato' }}</span></p> <!-- Numero di pagine -->
                </div>

                <div class="col-md-12 mb-3">
                    <h5 class="text-muted">Descrizione:</h5>
                    <p>{{ $book->description }}</p>
                </div>

                <!-- Visualizza l'immagine se presente -->
                <div class="col-md-12 mb-3">
                    <h5 class="text-muted">Immagine:</h5>
                    @if($book->image)
                        <img src="{{ asset("img/books/".$book->image) }}" alt="Immagine del libro" class="img-fluid" style="max-height: 400px; width: auto;">
                    @else
                        <p>Immagine non disponibile</p>
                    @endif
                </div>

                <div class="col-12 d-flex justify-content-between border-top pt-4">

                    <div class="d-flex align-items-center">
                        <!-- Form per eliminare il libro -->
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Sei sicuro? Stai eliminando questo libro')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash"></i> Elimina
                            </button>
                        </form>

                        <!-- Link per modificare il libro -->
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-outline-primary ms-3">
                            <i class="bi bi-pencil"></i> Modifica
                        </a>
                    </div>
                    <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Torna alla lista dei libri
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
