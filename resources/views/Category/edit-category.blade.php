@extends('layout.main')

@section('page-title', 'Modifica Categoria')

@section('header-title')
    Modifica Categoria: {{ $category->name }}
@endsection

@section('header-content')
    Modifica le informazioni della categoria nel modulo sottostante.
@endsection

@section('main-content')
    <form action="{{ route('categories.update', $category->id) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')

        <!-- Nome della categoria -->
        <div class="mb-3">
            <label for="name" class="form-label">Nome della Categoria</label>
            <input type="text" id="name" name="name"
                   class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name', $category->name) }}" >
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
                <i class="bi bi-save"></i> Salva Modifiche
            </button>

        </div>
    </form>
@endsection
