@extends('layouts.default')

@section('content')
    <h1>Détails du Cours: {{ $cours->nom }}</h1>

    <p><strong>Nom:</strong> {{ $cours->nom }}</p>
    <p><strong>Date et Heure:</strong> {{ $cours->date_heure }}</p>
    <p><strong>Matière:</strong> {{ $cours->matiere->nom }}</p>
    <p><strong>Classe:</strong> {{ $cours->classe->nom }}</p>

    <a href="{{ route('cours.edit', $cours->id) }}" class="btn btn-warning">Modifier</a>
    <form action="{{ route('cours.destroy', $cours->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce cours ?')">Supprimer</button>
    </form>

    <a href="{{ route('cours.index') }}" class="btn btn-secondary">Retour à la liste</a>
@endsection