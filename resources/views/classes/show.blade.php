@extends('layouts.app')

@section('content')
    <h1>Détails de la Classe</h1>
    <p><strong>Nom :</strong> {{ $classe->nom }}</p>
    <p><strong>Niveau :</strong> {{ $classe->niveau }}</p>
    <a href="{{ route('classes.index') }}">Retour à la liste</a>
@endsection