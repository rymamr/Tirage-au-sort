<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matiere;

class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupérer toutes les matières
        $matieres = Matiere::all();

        // Retourner la vue avec les matières
        return view('matieres.index', compact('matieres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Retourner la vue de création d'une matière
        return view('matieres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|max:30', // Le nom de la matière doit être obligatoire et ne pas dépasser 30 caractères
        ]);

        // Création de la matière
        Matiere::create($request->all());
            

        // Rediriger vers la liste des matières avec un message de succès
        return redirect()->route('matieres.index')
            ->with('success', 'Matière créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Trouver la matière par son ID
        $matiere = Matiere::find($id);

        // Retourner la vue de détail de la matière
        return view('matieres.show', compact('matiere'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       // Trouver la matière par son ID
       $matiere = Matiere::find($id);

       // Retourner la vue d'édition avec la matière à modifier
       return view('matieres.edit', compact('matiere'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|max:30', // Le nom de la matière doit être obligatoire et ne pas dépasser 30 caractères
        ]);

        // Trouver la matière par son ID
        $matiere = Matiere::find($id);

        // Mettre à jour la matière
        $matiere->update($request->all());
        // Rediriger vers la liste des matières avec un message de succès
        return redirect()->route('matieres.index')
            ->with('success', 'Matière mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       // Trouver la matière par son ID
       $matiere = Matiere::find($id);

       // Supprimer la matière
       $matiere->delete();

       // Rediriger vers la liste des matières avec un message de succès
       return redirect()->route('matieres.index')
           ->with('success', 'Matière supprimée avec succès.');
    }
}
