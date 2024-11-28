@extends('layouts.default')

@section('contenu')
<div class="container h-100 mt-5">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Interrogation du {{ \Carbon\Carbon::parse($interrogation->date_heure)->format('d/m/Y H:i') }}</h5>
            </div>
            <div class="card-body">
                <p class="card-text"><strong>Durée :</strong> {{ $interrogation->duree }} minutes</p>
                <p class="card-text"><strong>Commentaire :</strong> {{ $interrogation->commentaire }}</p>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <a href="{{ route('interrogations.edit', $interrogation->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                <form action="{{ route('interrogations.destroy', $interrogation->id) }}" method="post" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('pied_page')
     <p>Pied de page de la page d'Accueil</p>
@stop