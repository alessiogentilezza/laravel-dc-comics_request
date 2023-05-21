@extends('layouts.app')

@section('page-title')
    Modifica un fumetto:
@endsection

@section('content')
    <form method="POST" action="{{ route('comics.update', ['comic' => $comic->id]) }}" class="mb-3">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="thumb" class="form-label">Url dell'immagine:</label>
            <input type="url" placeholder="http://..." class="form-control @error('thumb') is-invalid @enderror"
                id="thumb" name="thumb" value="{{ old('thumb', $comic->thumb) }}">
            @error('thumb')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Titolo:</label>
            <input type="text" placeholder="testo" class="form-control @error('title') is-invalid @enderror"
                id="title" name="title" value="{{ old('title', $comic->title) }}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea type="text" placeholder="testo" class="form-control @error('description') is-invalid @enderror"
                id="description" name="description">{{ old('description', $comic->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Prezzo:</label>
            <input type="text" placeholder="10.00" class="form-control @error('price') is-invalid @enderror"
                id="price" name="price" value="{{ old('price', $comic->price) }}">
            @error('price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="series" class="form-label">Serie:</label>
            <input type="text" placeholder="testo" class="form-control @error('series') is-invalid @enderror"
                id="series" name="series" value="{{ old('series', $comic->series) }}">
            @error('series')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="sale_date" class="form-label">Data di uscita:</label>
            <input type="date" placeholder="2023-05-16" class="form-control @error('sale_date') is-invalid @enderror"
                id="sale_date" name="sale_date" value="{{ old('sale_date', $comic->sale_date) }}">
            @error('sale_date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Tipo:</label>
            <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type"
                value="{{ old('type', $comic->type) }}">
            @error('type')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="d-flex">
            <button type="submit" class="btn btn-success me-3">Salva</button>
            <a class="btn btn-primary" href="{{ route('comics.index') }}">Torna alla lista</a>
        </div>

    </form>
@endsection
