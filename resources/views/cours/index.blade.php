@extends('layouts.app')

@section('header')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestion des cours') }}
        </h2>
@endsection

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('cours.create') }}" class="btn btn-success btn-sm">Ajouter un cours</a>
            </div>
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h3>{{ __('Liste des cours') }}</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Date et Heure</th>
                                <th>Classe</th>
                                <th>Matière</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cours as $coursItem)
                                <tr>
                                    <td>{{ $coursItem->nom }}</td>
                                    <td>{{ $coursItem->date_heure }}</td>
                                    <td>{{ $coursItem->classe->nom }}</td>
                                    <td>{{ $coursItem->matiere->nom }}</td>
                                    <td>
                                        <a href="{{ route('cours.show', $coursItem->idcours) }}" class="btn btn-info btn-sm">Détails</a>
                                        <a href="{{ route('cours.edit', $coursItem->idcours) }}" class="btn btn-primary btn-sm">Modifier</a>
                                        <form action="{{ route('cours.destroy', $coursItem->idcours) }}" method="post" class="d-inline" onsubmit="return confirm('Voulez-vous vraiment supprimer ce cours ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
