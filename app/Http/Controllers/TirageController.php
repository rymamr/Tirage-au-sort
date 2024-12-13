<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Classe;
use App\Models\Cour;
use App\Models\Interrogation;
use Illuminate\Http\Request;

class TirageController extends Controller
{
    public function tirage($idcours)
    {
        // Récupérer la classe associée au cours
        $classe = Classe::whereHas('cours', function ($query) use ($idcours) {
            $query->where('idcours', $idcours);
        })->first();

        // Récupérer les élèves de la classe
        $eleves = User::whereHas('roles', function ($query) {
            $query->where('typerole', 'Apprenant');
        })->whereHas('classes', function ($query) use ($classe) {
            $query->where('idclasse', $classe->idclasse);
        })->get();

        // Appliquer une logique "juste" pour le tirage
        $eleveTire = $eleves->sortBy(function ($eleve) {
            // Donne plus de chances à ceux qui n'ont pas été interrogés récemment
            $lastInterrogation = $eleve->interrogations()->latest()->first();
            return $lastInterrogation ? $lastInterrogation->date_heure->diffInDays(now()) : PHP_INT_MAX;
        })->first();

        // Sauvegarder l'interrogation
        Interrogation::create([
            'iduser' => $eleveTire->id,
            'date_heure' => now(),
            'duree' => 10,
            'commentaire' => 'Interrogé au hasard',
        ]);

        return response()->json(['message' => 'Élève interrogé : ' . $eleveTire->name]);
    }

    public function showTirageForm()
    {
        // Récupérer tous les cours disponibles
        $cours = Cour::all(); // Assurez-vous que le modèle Cour est importé

        // Passer la variable $cours à la vue
        return view('tirage.index', compact('cours')); // Assurez-vous que la vue est correctement référencée
    }
}
