@extends('layouts.app')

@section('header')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter une nouvelle matière') }}
        </h2>
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">{{ __('Créer une matière') }}</div>

                    <div class="card-body">
                        <form action="{{ route('matieres.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nom" class="form-label">Nom de la matière</label>
                                <input type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom') }}" required maxlength="30">
                                @error('nom')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-success mt-3">Ajouter</button>
                            <a href="{{ route('matieres.index') }}" class="btn btn-secondary mt-3 ms-3">Retour</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
