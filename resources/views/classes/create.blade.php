@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h3>Ajouter une classe</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('classes.store') }}" method="post">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom de la classe</label>
                            <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrez le nom de la classe" required>
                        </div>

                        <div class="mb-3">
                            <label for="niveau" class="form-label">Niveau</label>
                            <textarea class="form-control" id="niveau" name="niveau" rows="3" placeholder="Entrez le niveau de la classe" required></textarea>
                        </div>

                        <div class="d-grid gap-2">
                            <!-- Bouton Créer avec une icône et un effet de survol -->
                            <button type="submit" class="btn btn-primary d-flex align-items-center justify-content-center">
                                <i class="bi bi-plus-circle me-2"></i>Créer une classe
                            </button>
                            
                            <!-- Bouton Retour avec une icône et un effet de survol -->
                            <a href="{{ route('matieres.index') }}" class="btn btn-secondary mt-3 d-flex align-items-center justify-content-center">
                                <i class="bi bi-arrow-left-circle me-2"></i>Retour
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
