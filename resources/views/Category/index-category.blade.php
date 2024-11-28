@extends('layout.main')

@section('page-title', 'Categorie')

@section('header-title')
    Lista delle Categorie
@endsection

@section('header-content')
    Qui puoi visualizzare tutte le categorie presenti nel database.
@endsection

@section('main-content')
    <!-- Bottone per aggiungere una nuova categoria -->
    <div class="mb-4">
        <a href="{{ route('categories.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Aggiungi una Categoria
        </a>
    </div>

    <!-- Lista delle categorie -->
    <div class="list-categories">
        @foreach ($categories as $category)
            <article class="card mb-4 border-0">
                <div class="card-body">
                    <h3 class="card-title">{{ $category->name }}</h3>
                    </p>

                    <!-- Azioni sulla categoria -->
                    <div class="btn-group mt-3 d-flex justify-content-center" role="group">

                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-light">
                            <i class="bi bi-pencil"></i> Modifica
                        </a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                              onsubmit="return confirm('Sei sicuro di voler eliminare questa categoria?')">
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
