<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    // Affiche le formulaire de création d'une nouvelle réponse pour une question spécifique
    // AnswerController.php (create method)
public function create(Question $question)
{
    $answers = Answer::where('question_id', $question->id)->get(); // Fetch answers related to the question
    return view('answers.create', compact('question', 'answers')); 
}

    // Stocke une nouvelle réponse dans la base de données
    public function store(Request $request, Question $question)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $question->answers()->create([
            'content' => $request->content,
            // Uncomment if needed
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('questions.show', $question)->with('success', 'Réponse ajoutée avec succès!');
    }

    // Affiche la liste de toutes les réponses avec les questions associées
    // Affiche la liste de toutes les réponses avec les questions associées
// AnswerController.php
public function index(Request $request)
{
    $question_id = $request->query('question_id');
    $answers = Answer::with('question.rubric')->get();
    $questionsWithoutAnswers = Question::doesntHave('answers')->get();

    return view('answers.index', compact('answers', 'questionsWithoutAnswers'));
}




    // Affiche le formulaire pour modifier une réponse spécifique
    public function edit(Answer $answer)
    {
        return view('answers.edit', compact('answer'));
    }

    // Met à jour une réponse spécifique dans la base de données
    public function update(Request $request, Answer $answer)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $answer->update($request->only('content'));

        return redirect()->route('answers.index')->with('success', 'Réponse mise à jour avec succès.');
    }

    // Supprime une réponse spécifique de la base de données
    public function destroy(Answer $answer)
    {
        $answer->delete();

        return redirect()->route('answers.index')->with('success', 'Réponse supprimée avec succès.');
    }
    
    public function show(Answer $answer)
    {
        // Retourne la vue avec les données de la réponse
        return view('answers.show', compact('answer'));
    }
}