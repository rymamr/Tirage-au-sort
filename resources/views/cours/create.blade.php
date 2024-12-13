@extends('layouts.app')

@section('header')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter un cours') }}
        </h2>
    </x-slot>
@endsection

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white text-center">
                    <h3>{{ __('Créer un nouveau cours') }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('cours.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom du cours</label>
                            <input type="text" class="form-control" id="nom" name="nom" required>
                        </div>
                        <div class="mb-3">
                            <label for="date_heure" class="form-label">Date et Heure</label>
                            <input type="datetime-local" class="form-control" id="date_heure" name="date_heure" required>
                        </div>
                        <div class="mb-3">
                            <label for="idmatiere" class="form-label">Matière</label>
                            <select class="form-select" id="idmatiere" name="idmatiere" required>
                                @foreach ($matieres as $matiere)
                                    <option value="{{ $matiere->idmatiere }}">{{ $matiere->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="idclasse" class="form-label">Classe</label>
                            <select class="form-select" id="idclasse" name="idclasse" required>
                                @foreach ($classes as $classe)
                                    <option value="{{ $classe->idclasse }}">
                                        {{ $classe->nom }} - Niveau : {{ $classe->niveau }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Créer le cours</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
