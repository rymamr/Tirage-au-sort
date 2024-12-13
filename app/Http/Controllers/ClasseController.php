<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classe;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupérer toutes les classes
        $classes = Classe::all();

        // Passer les classes à la vue
        return view('classes.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('classes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $request->validate([
                'nom' => 'required|max:255',
                'niveau' => 'required',
            ]);
    
            Classe::create($request->all());
    
            // Rediriger vers la liste des matières avec un message de succès
            return redirect()->route('classes.index')
                ->with('success', 'Classe créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $classe = Classe::find($id);

        return view('classes.show', compact('classe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $classe = Classe::find($id);

        return view('classes.edit', compact('classe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nom' => 'required|max:255',
            'niveau' => 'required',
        ]);

        $classe = Classe::find($id);
        $classe->update($request->all());

        return redirect()->route('classes.index')
            ->with('success', 'Classe mise à jour avec succès.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $classe = Classe::find($id);
        $classe->delete();

        return redirect()->route('classes.index')
            ->with('success', 'Classe supprimée avec succès.');
    }
}
