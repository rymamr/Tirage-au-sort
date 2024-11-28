<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Interrogation;

class InterrogationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupérer toutes les classes
        $interrogations = Interrogation::all();

        // Passer les classes à la vue
        return view('interrogations.index', compact('interrogations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('interrogations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date_heure' => 'required|date',
            'duree' => 'required|integer',
            'commentaire' => 'required|max:250',
        ]);

        // Créer l'interrogation avec les données validées
        Interrogation::create($request->all());

        return redirect()->route('interrogations.index')
            ->with('success', 'Interrogation created successfully.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $interrogation = Interrogation::find($id);

        return view('interrogations.show', compact('interrogation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       
       $interrogation = Interrogation::find($id);

       return view('interrogations.edit', compact('interrogation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validation des données
        $request->validate([
            'date_heure' => 'required|date',
            'duree' => 'required|integer',
            'commentaire' => 'required|max:250',
        ]);

        // Créer une nouvelle interrogation
        $interrogation = Interrogation::find($id);
        $interrogation->update($request->all());

        return redirect()->route('interrogations.index')
            ->with('success', 'Interrogation updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $interrogation = Interrogation::find($id);
        $interrogation->delete();

        return redirect()->route('interrogations.index')
            ->with('success', 'Interrogation deleted successfully');
    }
}
