<?php

namespace App\Http\Controllers;

use App\Models\cour;
use App\Models\User;
use Illuminate\Http\Request;

class CourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $cours=Cour::all();
        return view('cours.index', compact('cours'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users=User::where('type','enseignant')->get();
        return view('cours.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          // Valider les données du formulaire
    $validatedData = $request->validate([
        'nom_cours' => 'required|string|max:255',
        'date_heure' => 'required|string',
        'user_id' => 'required|integer',
    ]);

    // Créer un nouveau Cours
    $cour = new Cour();
    $cour->nom_cours = $validatedData['nom_cours'];
    $cour->date_heure = $validatedData['date_heure'];
    $cour->user_id = $validatedData['user_id'];
    $cour->save();

    // Rediriger vers la page de la liste des produits avec un message de succès
    return redirect()->route('cours.index')->with('success', 'Le cours a été créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(cour $cour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cour $cour)
    {
        $users=User::where('type','enseignant')->get();
        return view('cours.edit', compact('cour','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cour $cour)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'nom_cours' => 'required|string|max:255',
            'date_heure' => 'required|string',
            'user_id' => 'required|integer',
        ]);

    // Mettre à jour les informations du cours
    $cour->nom_cours = $validatedData['nom_cours'];
    $cour->date_heure = $validatedData['date_heure'];
    $cour->user_id = $validatedData['user_id'];
    $cour->save();

    // Rediriger vers la page de la liste des produits avec un message de succès
    return redirect()->route('cours.index')->with('success', 'Le cours a été mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cour $cour)
    {
        // Supprimer le produit
        $cour->delete();

        // Rediriger vers la page de la liste des produits avec un message de succès
        return redirect()->route('cours.index')->with('success', 'Le cours a été supprimé avec succès.');
    }
}
