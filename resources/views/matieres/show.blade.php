@extends('layouts.default')

@section('contenu')
<div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ $matiere->nom }}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $matiere->niveau }}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('classes.edit', $matiere->idmatiere) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('classes.destroy', $matiere->idmatiere) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('pied_page')
     <p>Pied de page de la page d'Accueil</p>
@stop