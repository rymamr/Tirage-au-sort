@extends('layouts.app')

@section('header')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier le cours') }}
        </h2>
    </x-slot>
@endsection

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-white text-center">
                    <h3>{{ __('Modifier le cours') }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('cours.update', $cours->idcours) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom du cours</label>
                            <input type="text" class="form-control" id="nom" name="nom" value="{{ $cours->nom }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="date_heure" class="form-label">Date et Heure</label>
                            <input type="datetime-local" class="form-control" id="date_heure" name="date_heure" value="{{ $cours->date_heure }}" required>
                        </div>
                        
                        <button type="submit" class="btn btn-warning">Mettre à jour le cours</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
