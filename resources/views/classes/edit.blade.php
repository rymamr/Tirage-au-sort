@extends('layouts.default')

@section('contenu')
<div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-6">
                <h3>Update Post</h3>
                <form action="{{ route('classes.update', $classe->idclasse) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom"
                            value="{{ $classe->nom }}" required>
                    </div>
                    <div class="form-group">
                        <label for="niveau">Niveau</label>
                        <textarea class="form-control" id="niveau" name="niveau" rows="3" required>{{ $classe->niveau }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Modifier la classe</button>
                </form>
            </div>
        </div>
    </div>
@stop

@section('pied_page')
     <p>Pied de page de la page d'Accueil</p>
@stop