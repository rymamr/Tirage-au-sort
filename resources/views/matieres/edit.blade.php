@extends('layouts.app')

@section('header')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier la matière') }}
        </h2>
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">{{ __('Modifier la matière') }}</div>

                    <div class="card-body">
                        <form action="{{ route('matieres.update', $matiere->idmatiere) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nom" class="form-label">Nom de la matière</label>
                                <input type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom', $matiere->nom) }}" required maxlength="30">
                                @error('nom')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-warning mt-3">Mettre à jour</button>
                            <a href="{{ route('matieres.index') }}" class="btn btn-secondary mt-3 ms-3">Retour</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
