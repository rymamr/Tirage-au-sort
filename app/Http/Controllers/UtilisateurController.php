<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;
use App\Models\Classe;  // Assurez-vous d'avoir le modèle pour la table PFX_classes
use App\Models\Role;   // Assurez-vous d'avoir le modèle pour la table PFX_roles

class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupérer tous les utilisateurs
        $utilisateurs = Utilisateur::all();

        // Retourner la vue avec les utilisateurs
        return view('utilisateurs.index', compact('utilisateurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Récupérer toutes les classes et rôles pour les afficher dans le formulaire de création
        $classes = Classe::all();
        $roles = Role::all();

        // Retourner la vue de création avec les classes et rôles
        return view('utilisateurs.create', compact('classes', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'nom' => 'nullable|string|max:30',
            'prenom' => 'required|string|max:25',
            'mail' => 'required|email|unique:PFX_utilisateurs,mail|max:100',
            'login' => 'required|string|unique:PFX_utilisateurs,login|max:50',
            'mdp' => 'required|string|min:8',
            'idclasse' => 'nullable|exists:PFX_classes,idclasse',
            'idrole' => 'required|exists:PFX_roles,idrole',
        ]);

        // Création d'un nouvel utilisateur
        Utilisateur::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'mail' => $request->mail,
            'login' => $request->login,
            'mdp' => bcrypt($request->mdp),  // Chiffrement du mot de passe
            'idclasse' => $request->idclasse,
            'idrole' => $request->idrole,
        ]);

        // Rediriger vers la liste des utilisateurs avec un message de succès
        return redirect()->route('utilisateurs.index')
            ->with('success', 'Utilisateur créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Trouver l'utilisateur par son ID
        $utilisateur = Utilisateur::findOrFail($id);

        // Retourner la vue de détail de l'utilisateur
        return view('utilisateurs.show', compact('utilisateur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         // Trouver l'utilisateur par son ID
         $utilisateur = Utilisateur::findOrFail($id);

         // Récupérer toutes les classes et rôles pour les afficher dans le formulaire de modification
         $classes = Classe::all();
         $roles = Role::all();
 
         // Retourner la vue d'édition avec les données de l'utilisateur, classes et rôles
         return view('utilisateurs.edit', compact('utilisateur', 'classes', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // Validation des données
         $request->validate([
            'nom' => 'nullable|string|max:30',
            'prenom' => 'required|string|max:25',
            'mail' => 'required|email|unique:PFX_utilisateurs,mail,' . $id . '|max:100',  // Unique sauf pour cet ID
            'login' => 'required|string|unique:PFX_utilisateurs,login,' . $id . '|max:50',  // Unique sauf pour cet ID
            'mdp' => 'nullable|string|min:8',
            'idclasse' => 'nullable|exists:PFX_classes,idclasse',
            'idrole' => 'required|exists:PFX_roles,idrole',
        ]);

        // Trouver l'utilisateur par son ID
        $utilisateur = Utilisateur::findOrFail($id);

        // Mettre à jour les données de l'utilisateur
        $utilisateur->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'mail' => $request->mail,
            'login' => $request->login,
            'mdp' => $request->mdp ? bcrypt($request->mdp) : $utilisateur->mdp,  // Si le mot de passe est fourni, le chiffrer
            'idclasse' => $request->idclasse,
            'idrole' => $request->idrole,
        ]);

        // Rediriger vers la liste des utilisateurs avec un message de succès
        return redirect()->route('utilisateurs.index')
            ->with('success', 'Utilisateur mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         // Trouver l'utilisateur par son ID
         $utilisateur = Utilisateur::findOrFail($id);

         // Supprimer l'utilisateur
         $utilisateur->delete();
 
         // Rediriger vers la liste des utilisateurs avec un message de succès
         return redirect()->route('utilisateurs.index')
             ->with('success', 'Utilisateur supprimé avec succès.');
    }
}
