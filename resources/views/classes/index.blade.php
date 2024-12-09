@extends('layouts.default')

@section('contenu')
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand h1" href={{ route('classes.index') }}>Classes</a>
            <div class="justify-end ">
                <div class="col ">
                    <a class="btn btn-sm btn-success" href={{ route('classes.create') }}>Ajouter une classe</a>
                </div>
            </div>
    </nav>
<div class="container mt-5">
        <div class="row">
            @foreach ($classes as $classe)
                <div class="col-sm">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">{{ $classe->nom }}</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $classe->niveau }}</p>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm">
                                <a href="{{ route('classes.edit', $classe->idclasse) }}" class="btn btn-primary btn-sm">Edit</a>
                                </div>
                                <div class="col-sm">
                                <a href="{{ route('classes.show', $classe->idclasse) }}" class="btn btn-primary btn-sm">SHOW</a>
                                </div>
                                <div class="col-sm">
                                    <form action="{{ route('classes.destroy', $classe->idclasse) }}" method="post">
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
@stop

@section('pied_page')
     <p>Pied de page de la page d'Accueil</p>
@stop