@extends('layouts.app')

@section('header')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Détails du cours') }}
        </h2>
    </x-slot>
@endsection

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white text-center">
                    <h3>{{ __('Détails du cours') }}</h3>
                </div>
                <div class="card-body">
                    <p><strong>ID du cours :</strong> {{ $cours->idcours }}</p>
                    <p><strong>Nom :</strong> {{ $cours->nom }}</p>
                    <p><strong>Date et Heure :</strong> {{ $cours->date_heure }}</p>
                    <p><strong>Matière :</strong> {{ $cours->matiere->nom }}</p>
                    <p><strong>Classe :</strong> {{ $cours->classe->nom }}</p>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('cours.edit', $cours->idcours) }}" class="btn btn-primary btn-sm">Modifier</a>
                    <form action="{{ route('cours.destroy', $cours->idcours) }}" method="POST" class="d-inline" onsubmit="return confirm('Voulez-vous vraiment supprimer ce cours ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                </div>
                <div class="card-footer text-center mt-3">
                    <a href="{{ route('cours.index') }}" class="btn btn-secondary btn-sm">Retour à la liste</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
