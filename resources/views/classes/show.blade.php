@extends('layouts.app')

@section('header')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Détails de la classe') }}
        </h2>
    </x-slot>
@endsection

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white text-center">
                    <h3>Détails de la classe</h3>
                </div>
                <div class="card-body">
                    <p class="card-text"><strong>ID Classe :</strong> {{ $classe->idclasse }}</p> <!-- Affichage de l'ID en gras -->
                    <h5 class="card-title"><strong>Nom de la classe :</strong> {{ $classe->nom }}</h5>
                    <p class="card-text"><strong>Niveau :</strong> {{ $classe->niveau }}</p>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('matieres.edit', $classe->idclasse) }}" class="btn btn-primary btn-sm">Modifier</a>
                    <form action="{{ route('classes.destroy', $classe->idclasse) }}" method="post" class="d-inline" onsubmit="return confirm('Voulez-vous vraiment supprimer cette matière ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                </div>
                <!-- Ajout du bouton retour -->
                <div class="card-footer text-center mt-3">
                    <a href="{{ route('classes.index') }}" class="btn btn-secondary btn-sm">Retour</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('pied_page')
<div class="text-center mt-4">
    <p class="text-muted">Pied de page de la page des classes</p>
</div>
@stop
