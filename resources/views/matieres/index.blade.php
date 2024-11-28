@extends('layouts.default')

@section('contenu')
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand h1" href={{ route('matieres.index') }}>Matières</a>
            <div class="justify-end ">
                <div class="col ">
                    <a class="btn btn-sm btn-success" href={{ route('matieres.create') }}>Ajouter une matiere</a>
                </div>
            </div>
    </nav>
<div class="container mt-5">
        <div class="row">
            @foreach ($matieres as $matiere)
                <div class="col-sm">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">{{ $matiere->nom }}</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $matiere->niveau }}</p>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm">
                                <a href="{{ route('matieres.edit', $matiere->idmatiere) }}" class="btn btn-primary btn-sm">Edit</a>
                                </div>
                                <div class="col-sm">
                                <a href="{{ route('matieres.show', $matiere->idmatiere) }}" class="btn btn-primary btn-sm">SHOW</a>
                                </div>
                                <div class="col-sm">
                                    <form action="{{ route('matieres.destroy', $matiere->idmatiere) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
@stop

@section('pied_page')
     <p>Pied de page de la page d'Accueil</p>
@stop