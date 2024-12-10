<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Interrogation;
use Illuminate\Http\Request;

class TirageController extends Controller
{
    public function tirage($idCours)
    {
        // Récupérer la classe associée au cours
        $classe = Classe::whereHas('cours', function ($query) use ($idCours) {
            $query->where('idcours', $idCours);
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
}
