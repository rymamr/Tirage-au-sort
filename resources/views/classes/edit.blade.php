@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-white text-center">
                    <h3>Mise à jour de la classe</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('classes.update', $classe->idclasse) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom de la classe</label>
                            <input type="text" class="form-control" id="nom" name="nom" value="{{ $classe->nom }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="niveau" class="form-label">Niveau</label>
                            <textarea class="form-control" id="niveau" name="niveau" rows="3" required>{{ $classe->niveau }}</textarea>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-warning">Modifier la classe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('pied_page')
<div class="text-center mt-4">
    <p class="text-muted">Pied de page de la page d'accueil</p>
</div>
@stop