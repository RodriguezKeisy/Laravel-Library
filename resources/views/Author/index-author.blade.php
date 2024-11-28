@extends('layout.main')

@section('page-title', 'Autori')

@section('header-title')
    Lista degli Autori
@endsection

@section('header-content')
    Qui puoi visualizzare tutti gli autori presenti nel database.
@endsection

@section('main-content')
    <!-- Bottone per aggiungere un nuovo autore -->
    <div class="mb-4">
        <a href="{{ route('authors.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Aggiungi un Autore
        </a>
    </div>

    <!-- Lista degli autori -->
    <div class="list-authors">
        @foreach ($authors as $author)
            <article class="card mb-4 border-0">
                <div class="card-body">
                    <h3 class="card-title">{{ $author->name }}</h3>
                    <small class="text-muted"> Data di nascita: {{$author->birthday ? $author->birthday->format('d.m.Y') : "Non disponibile" }}</small>

                    <!-- Azioni sull'autore -->
                    <div class="btn-group mt-3 d-flex justify-content-center" role="group">

                        <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-light">
                            <i class="bi bi-pencil"></i> Modifica
                        </a>
                        <form action="{{ route('authors.destroy', $author->id) }}" method="POST"
                              onsubmit="return confirm('Sei sicuro di voler eliminare questo autore?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-light">
                                <i class="bi bi-trash3"></i> Elimina
                            </button>
                        </form>
                    </div>
                </div>
            </article>
        @endforeach
    </div>
@endsection
