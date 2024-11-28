@extends('layouts.default')

@section('content')
    <h1>Modifier le Cours: {{ $cours->nom }}</h1>

    <form action="{{ route('cours.update', $cours->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="nom">Nom du Cours</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom', $cours->nom) }}" required maxlength="30">
        </div>

        <div class="form-group">
            <label for="date_heure">Date et Heure</label>
            <input type="datetime-local" name="date_heure" id="date_heure" class="form-control" value="{{ old('date_heure', $cours->date_heure) }}" required>
        </div>

        <div class="form-group">
            <label for="idmatiere">Matière</label>
            <select name="idmatiere" id="idmatiere" class="form-control" required>
                @foreach($matieres as $matiere)
                    <option value="{{ $matiere->idmatiere }}" {{ $cours->idmatiere == $matiere->idmatiere ? 'selected' : '' }}>{{ $matiere->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="idclasse">Classe</label>
            <select name="idclasse" id="idclasse" class="form-control" required>
                @foreach($classes as $classe)
                    <option value="{{ $classe->idclasse }}" {{ $cours->idclasse == $classe->idclasse ? 'selected' : '' }}>{{ $classe->nom }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
@endsection
