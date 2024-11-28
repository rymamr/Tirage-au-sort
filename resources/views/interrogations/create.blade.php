@extends('layouts.default')

@section('contenu')
<div class="container h-100 mt-5">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
            <h3>Créer une Interrogation</h3>
            <form action="{{ route('interrogations.store') }}" method="post">
                @csrf

                <!-- Champ pour la date et heure -->
                <div class="form-group">
                    <label for="date_heure">Date et Heure</label>
                    <input type="datetime-local" class="form-control" id="date_heure" name="date_heure" value="{{ old('date_heure') }}" required>
                </div>

                <!-- Champ pour la durée -->
                <div class="form-group mt-3">
                    <label for="duree">Durée (en minutes)</label>
                    <input type="number" class="form-control" id="duree" name="duree" value="{{ old('duree') }}" required>
                </div>

                <!-- Champ pour le commentaire -->
                <div class="form-group mt-3">
                    <label for="commentaire">Commentaire</label>
                    <textarea class="form-control" id="commentaire" name="commentaire" rows="3" maxlength="250" required>{{ old('commentaire') }}</textarea>
                </div>

                <!-- Bouton de soumission -->
                <br>
                <button type="submit" class="btn btn-primary">Créer une interrogation</button>
            </form>
        </div>
    </div>
</div>
@stop

@section('pied_page')
     <p>Pied de page de la page À propos</p>
@stop