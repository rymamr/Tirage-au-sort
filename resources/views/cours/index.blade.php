@extends('layouts.default')

@section('content')
    <h1>Liste des Cours</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('cours.create') }}" class="btn btn-primary mb-3">Ajouter un Cours</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Date & Heure</th>
                <th>Matière</th>
                <th>Classe</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cours as $item)
                <tr>
                    <td>{{ $item->nom }}</td>
                    <td>{{ $item->date_heure }}</td>
                    <td>{{ $item->matiere->nom }}</td>
                    <td>{{ $item->classe->nom }}</td>
                    <td>
                        <a href="{{ route('cours.show', $item->id) }}" class="btn btn-info btn-sm">Voir</a>
                        <a href="{{ route('cours.edit', $item->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('cours.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce cours ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection