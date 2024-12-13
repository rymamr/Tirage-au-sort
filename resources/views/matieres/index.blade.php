@extends('layouts.app')

@section('header')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestion des matières') }}
        </h2>
@endsection

@section('content')
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand h1" href="{{ route('matieres.index') }}">Matières</a>
            <div class="d-flex justify-content-end">
                <a class="btn btn-sm btn-success" href="{{ route('matieres.create') }}">Ajouter une matière</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row row-cols-3 row-cols-md-3 g-4">
            @foreach ($matieres as $matiere)
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h5 class="card-title mb-0">{{ $matiere->nom }}</h5>
                        </div>
                        <div class="card-footer text-center">
                            <div class="row">
                                <div class="col-4">
                                    <a href="{{ route('matieres.edit', $matiere->idmatiere) }}" class="btn btn-warning btn-sm w-100">Modifier</a>
                                </div>
                                <div class="col-4">
                                    <a href="{{ route('matieres.show', $matiere->idmatiere) }}" class="btn btn-info btn-sm w-100">Voir</a>
                                </div>
                                <div class="col-4">
                                    <form action="{{ route('matieres.destroy', $matiere->idmatiere) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cette matière ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm w-100">Supprimer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('pied_page')
    <p class="text-center mt-5">&copy; 2024 Gestion des Matières. Tous droits réservés.</p>
@stop
