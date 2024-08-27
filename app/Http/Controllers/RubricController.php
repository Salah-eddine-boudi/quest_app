<?php
namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Rubric;
use Illuminate\Http\Request;

class RubricController extends Controller
{
    // Affiche la liste des rubriques
    public function index(Rubric $rubric)
    {
        // Récupère toutes les rubriques de la base de données
        $rubrics = Rubric::all();
        
        // Retourne la vue 'rubrics.index' avec les données
        return view('rubrics.index', compact('rubrics','rubric'));
    }

    // Affiche le formulaire de création d'une nouvelle rubrique
    public function create()
    {
        // Récupère toutes les rubriques de la base de données pour les afficher dans le formulaire
        $rubrics = Rubric::all();
        
        // Retourne la vue 'rubrics.create' avec les données
        return view('rubrics.create', compact('rubrics'));
    }

    // Gère la soumission du formulaire de création
    public function store(Request $request)
    {
        // Valide les données soumises
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Crée une nouvelle rubrique dans la base de données
        Rubric::create($request->all());

        // Redirige vers la liste des rubriques avec un message de succès
        return redirect()->route('rubrics.index')->with('success', 'Rubrique ajoutée avec succès.');
    }

    // Affiche le formulaire d'édition d'une rubrique existante
    public function edit(Rubric $rubric)
    {
        // Récupère toutes les rubriques pour les afficher dans le formulaire d'édition
        $rubrics = Rubric::all();

        // Retourne la vue 'rubrics.edit' avec la rubrique à éditer et les autres rubriques
        return view('rubrics.edit', compact('rubric', 'rubrics'));
    }

    // Gère la soumission du formulaire d'édition
    public function update(Request $request, Rubric $rubric)
    {
        // Valide les données soumises
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Met à jour la rubrique dans la base de données
        $rubric->update($request->all());

        // Redirige vers la liste des rubriques avec un message de succès
        return redirect()->route('rubrics.index')->with('success', 'Rubrique mise à jour avec succès.');
    }

    // Supprime une rubrique existante
    public function destroy(Rubric $rubric)
    {
        // Supprime la rubrique de la base de données
        $rubric->delete();

        // Redirige vers la liste des rubriques avec un message de succès
        return redirect()->route('rubrics.index')->with('success', 'Rubrique supprimée avec succès.');
    }

    // Affiche les détails d'une rubrique spécifique
    public function show(Rubric $rubric)
{
    // Récupère toutes les rubriques de la base de données pour la vue
    $rubrics = Rubric::all();

    // Retourne la vue 'rubrics.index' avec les variables nécessaires
    return view('rubrics.index', compact('rubric', 'rubrics'));
}

}
