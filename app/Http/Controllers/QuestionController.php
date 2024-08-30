<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Rubric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    /**
     * Display a listing of the questions.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $questions = Question::with('rubric', 'user')->get(); // Eager load relationships
        return view('questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new question.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $rubrics = Rubric::all();
        return view('questions.create', ['rubrics' => $rubrics]);
    }

    /**
     * Store a newly created question in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'rubric_id' => 'required|exists:rubrics,id',
        ]);

        Question::create([
            'title' => $request->title,
            'content' => $request->content,
            'rubric_id' => $request->rubric_id,
            'user_id' => Auth::id(), // Utilisation d'Auth::id() pour obtenir l'utilisateur connecté
        ]);

        return redirect()->route('questions.index')->with('success', 'Question ajoutée avec succès.');
    }

    /**
     * Display the specified question.
     *
     * @param \App\Models\Question $question
     * @return \Illuminate\View\View
     */
    public function show(Question $question)
    {
        return view('questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified question.
     *
     * @param \App\Models\Question $question
     * @return \Illuminate\View\View
     */
    public function edit(Question $question)
    {
        $rubrics = Rubric::all();
        return view('questions.edit', compact('question', 'rubrics'));
    }

    /**
     * Update the specified question in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Question $question
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Question $question)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'rubric_id' => 'required|exists:rubrics,id',
        ]);

        $question->update($request->only('title', 'content', 'rubric_id'));

        return redirect()->route('questions.index')->with('success', 'Question mise à jour avec succès.');
    }

    /**
     * Remove the specified question from storage.
     *
     * @param \App\Models\Question $question
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->route('questions.index')->with('success', 'Question supprimée avec succès.');
    }
}
