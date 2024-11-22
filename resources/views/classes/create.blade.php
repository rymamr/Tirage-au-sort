@extends('layouts.app')

@section('content')
    <h1>Ajouter une Classe</h1>

    <form action="{{ route('classes.store') }}" method="POST">
        @csrf
        <div>
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" required>
        </div>
        <div>
            <label for="niveau">Niveau :</label>
            <input type="text" name="niveau" id="niveau" required>
        </div>
        <button type="submit">Ajouter</button>
    </form>
@endsection