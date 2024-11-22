@extends('layouts.app')

@section('content')
    <h1>Modifier la Classe</h1>

    <form action="{{ route('classes.update', $classe->idclasse) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" value="{{ $classe->nom }}" required>
        </div>
        <div>
            <label for="niveau">Niveau :</label>
            <input type="text" name="niveau" id="niveau" value="{{ $classe->niveau }}" required>
        </div>
        <button type="submit">Modifier</button>
    </form>
@endsection