@extends('layouts.default')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand h1" href={{ route('interrogations.index') }}>Interrogations</a>
            <div class="justify-end ">
                <div class="col ">
                    <a class="btn btn-sm btn-success" href={{ route('interrogations.create') }}>Ajouter une intero</a>
                </div>
            </div>
    </nav>
<div class="container mt-5">
        <div class="row">
            @foreach ($interrogations as $interrogation)
    <h1>Liste des Interrogations</h1>
    <a href="{{ route('interrogations.create') }}" class="btn btn-primary mb-3">Ajouter une Interrogation</a>

    @if($interrogations->isEmpty())
        <p>Aucune interrogation trouvée.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date et Heure</th>
                    <th>Durée (minutes)</th>
                    <th>Commentaire</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($interrogations as $interrogation)
    <div>
        <p><strong>Date & Heure:</strong> {{ \Carbon\Carbon::parse($interrogation->date_heure)->format('d/m/Y H:i') }}</p>
        <p><strong>Durée:</strong> {{ $interrogation->duree }} minutes</p>
        <p><strong>Commentaire:</strong> {{ $interrogation->commentaire }}</p>

        {{-- Vérification si le cours est bien chargé --}}
        @if($interrogation->cour)
            <p><strong>Cours:</strong> {{ $interrogation->cour->nom }}</p>
        @else
            <p><strong>Cours:</strong> Non défini</p>
        @endif

        {{-- Vérification si l'utilisateur est bien chargé --}}
        @if($interrogation->utilisateur)
            <p><strong>Utilisateur:</strong> {{ $interrogation->utilisateur->prenom }} {{ $interrogation->utilisateur->nom }}</p>
        @else
            <p><strong>Utilisateur:</strong> Non défini</p>
        @endif
    </div>
@endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
@stop

@section('pied_page')
     <p>Pied de page de la page d'Accueil</p>
@stop