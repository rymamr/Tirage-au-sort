@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Accueil') }}
    </h2>
@endsection

@section('content')
    <div id="about" class="about-section text-center p-6 mt-10 bg-gradient-to-r from-green-500 to-teal-600 text-black rounded-lg shadow-lg hover:shadow-2xl transition-shadow duration-300">
        <h1 class="text-center mb-4" style="font-size: 2rem; font-weight: 700;">Bienvenue sur TiragiX</h1>
        <p class="text-lg mb-4">L'application simple pour tirer au sort les élèves pour les interrogations orales, de manière juste et équilibrée</p>
        <p class="text-sm">Organisez vos classes, effectuez des tirages sans biais et offrez à chaque élève une chance équitable de participer</p>
    </div>
@endsection
