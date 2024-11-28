@extends('layout.main')

@section('page-title', 'Aggiungi Autore')

@section('header-title')
    Aggiungi un Nuovo Autore
@endsection

@section('header-content')
    Compila il modulo sottostante per aggiungere un nuovo autore.
@endsection

@section('main-content')
    <form action="{{ route('authors.store') }}" method="POST" class="mt-4">
        @csrf

        <!-- Nome dell'autore -->
        <div class="mb-3">
            <label for="name" class="form-label">Nome dell'Autore</label>
            <input type="text" id="name" name="name"
                   class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name') }}">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Data di nascita dell'autore -->
        <div class="mb-3">
            <label for="birthday" class="form-label">Data di Nascita</label>
            <input type="date" id="birthday" name="birthday"
                   class="form-control @error('birthday') is-invalid @enderror"
                   >
            @error('birthday')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Bottone per salvare -->
        <div class="d-flex justify-content-between">
            <a href="{{ route('authors.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Annulla
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Aggiungi Autore
            </button>

        </div>
    </form>
@endsection
