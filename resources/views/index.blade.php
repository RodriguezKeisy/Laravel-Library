@extends('layout.main')

@section('title', 'I miei Libri')

@section('header-title')
    I miei Libri
@endsection

@section('header-content')
    Qui puoi visualizzare tutti i libri della tua libreria personale.
@endsection

@section('main-content')
    <!-- Bottone per aggiungere un nuovo libro -->
    <div class="mb-4">
        <a href="{{ route('books.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Aggiungi un Libro
        </a>
    </div>

    <!-- Lista dei libri -->
    <div class="list-book">
        @forelse ($books as $book)
            <article class="card mb-4 border-0">
                <div class="card-body">
                    <h3 class="card-title">{{ $book->title }}</h3>
                    <p>di {{ $book->author->name }}</p>
                    <p><span class="badge text-bg-secondary">{{ $book->category->name }}</span></p>

                    <!-- Azioni sul libro -->
                    <div class="btn-group mt-3 d-flex justify-content-center" role="group">
                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-light">
                            <i class="bi bi-eye"></i> Visualizza
                        </a>
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-light">
                            <i class="bi bi-pencil"></i> Modifica
                        </a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST"
                              onsubmit="return confirm('Sei sicuro di voler eliminare questo libro?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-light">
                                <i class="bi bi-trash3"></i> Elimina
                            </button>
                        </form>
                    </div>
                </div>
            </article>
        @empty
            <div class="alert alert-warning" role="alert">
                Non ci sono libri nella tua libreria. <a href="{{ route('books.create') }}">Aggiungi il tuo primo libro!</a>
            </div>
        @endforelse
    </div>
@endsection
