@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('À propos') }}
    </h2>
@endsection

@section('content')
    <div id="about" class="about-section text-center p-6 mt-10 bg-gradient-to-r from-green-500 to-teal-600 text-black rounded-lg shadow-lg hover:shadow-2xl transition-shadow duration-300">
        <h1 class="text-center mb-4" style="font-size: 2rem; font-weight: 700;">À propos de TiragiX</h1>
        <p class="text-lg mb-4">TiragiX rend le tirage au sort des élèves simple, rapide et juste. Chaque élève a une chance équitable d’être sélectionné pour l’oral</p>
        <p class="text-sm">Idéal pour les enseignants qui veulent un système fiable pour gérer leurs interrogations orales, sans stress ni favoritisme</p>
    </div>
@endsection