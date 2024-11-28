@extends('layout.main')

@section('page-title', 'Aggiungi Categoria')

@section('header-title')
    Aggiungi una Nuova Categoria
@endsection

@section('header-content')
    Compila il modulo sottostante per aggiungere una nuova categoria.
@endsection

@section('main-content')
    <form action="{{ route('categories.store') }}" method="POST" class="mt-4">
        @csrf

        <!-- Nome della categoria -->
        <div class="mb-3">
            <label for="name" class="form-label">Nome della Categoria</label>
            <input type="text" id="name" name="name"
                   class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name') }}" >
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Bottone per salvare -->
        <div class="d-flex justify-content-between">
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Annulla
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Aggiungi Categoria
            </button>

        </div>
    </form>
@endsection
