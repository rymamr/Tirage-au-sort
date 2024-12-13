<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cour;
use App\Models\Matiere; // Modèle pour PFX_matieres
use App\Models\Classe; // Modèle pour PFX_classes

class CourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupérer tous les cours
        $cours = Cour::all();

        // Retourner la vue avec les cours
        return view('cours.index', compact('cours'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() 
    {
        // Récupérer toutes les matières et classes pour les afficher dans le formulaire
        $matieres = Matiere::all();
        $classes = Classe::all();

        // Retourner la vue de création avec les matières et classes
        return view('cours.create', compact('matieres', 'classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|max:30',
            'date_heure' => 'required|date',
            'idmatiere' => 'required|exists:PFX_matieres,idmatiere', // Vérifier que la matière existe
            'idclasse' => 'required|exists:PFX_classes,idclasse', // Vérifier que la classe existe
        ]);

        // Création d'un nouveau cours
        Cour::create([
            'nom' => $request->nom,
            'date_heure' => $request->date_heure,
            'idmatiere' => $request->idmatiere,
            'idclasse' => $request->idclasse,
        ]);

        // Rediriger vers la liste des cours avec un message de succès
        return redirect()->route('cours.index')
            ->with('success', 'Cours créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Trouver le cours par son ID
        $cours = Cour::findOrFail($id);

        // Retourner la vue de détail du cours
        return view('cours.show', compact('cours'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Trouver le cours par son ID
        $cours = Cour::findOrFail($id);

        // Récupérer toutes les matières et classes pour les afficher dans le formulaire d'édition
        $matieres = Matiere::all();
        $classes = Classe::all();

        // Retourner la vue d'édition avec les données du cours, matières et classes
        return view('cours.edit', compact('cours', 'matieres', 'classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|max:30',
            'date_heure' => 'required|date',
            'idmatiere' => 'required|exists:PFX_matieres,idmatiere', // Vérifier que la matière existe
            'idclasse' => 'required|exists:PFX_classes,idclasse', // Vérifier que la classe existe
        ]);

        // Trouver le cours par son ID
        $cours = Cour::findOrFail($id);

        // Mettre à jour le cours
        $cours->update([
            'nom' => $request->nom,
            'date_heure' => $request->date_heure,
            'idmatiere' => $request->idmatiere,
            'idclasse' => $request->idclasse,
        ]);

        // Rediriger vers la liste des cours avec un message de succès
        return redirect()->route('cours.index')
            ->with('success', 'Cours mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         // Trouver le cours par son ID
         $cours = Cour::findOrFail($id);

         // Supprimer le cours
         $cours->delete();
 
         // Rediriger vers la liste des cours avec un message de succès
         return redirect()->route('cours.index')
             ->with('success', 'Cours supprimé avec succès.');
    }
}