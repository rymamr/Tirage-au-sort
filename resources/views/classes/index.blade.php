@extends('layouts.app')

@section('header')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestion des classes') }}
        </h2>
@endsection

@section('content')
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand h1" href="{{ route('classes.index') }}">Classes</a>
            <div class="d-flex justify-content-end">
                <a class="btn btn-sm btn-success" href="{{ route('classes.create') }}">Ajouter une classe</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($classes as $classe)
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h5 class="card-title mb-0">{{ $classe->nom }}</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $classe->niveau }}</p>
                        </div>
                        <div class="card-footer text-center">
                            <div class="row">
                                <div class="col-4">
                                    <a href="{{ route('classes.edit', $classe->idclasse) }}" class="btn btn-warning btn-sm w-100">Modifier</a>
                                </div>
                                <div class="col-4">
                                    <a href="{{ route('classes.show', $classe->idclasse) }}" class="btn btn-info btn-sm w-100">Voir</a>
                                </div>
                                <div class="col-4">
                                    <form action="{{ route('classes.destroy', $classe->idclasse) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cette classe ?');">
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
    <p class="text-center mt-5">&copy; 2024 Gestion des Classes. Tous droits réservés.</p>
@stop
