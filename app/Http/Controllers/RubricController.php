<?php
namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Rubric;
use Illuminate\Http\Request;
use app\Models\Question;

class RubricController extends Controller
{

    public function index(Rubric $rubric)
    {
     
        $rubrics = Rubric::all();
        

        return view('rubrics.index', compact('rubrics','rubric'));
    }

    public function create()
    {
        
        $rubrics = Rubric::all();
        
      
        return view('rubrics.create', compact('rubrics'));
    }

    
    public function store(Request $request)
    {
       
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

       
        Rubric::create($request->all());

        return redirect()->route('rubrics.index')->with('success', 'Rubrique ajoutée avec succès.');
    }

    
    public function edit(Rubric $rubric)
    {
       
        $rubrics = Rubric::all();


        return view('rubrics.edit', compact('rubric', 'rubrics'));
    }

    public function update(Request $request, Rubric $rubric)
    {
   
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

      
        $rubric->update($request->all());

      
        return redirect()->route('rubrics.index')->with('success', 'Rubrique mise à jour avec succès.');
    }


    public function destroy(Rubric $rubric)
    {
     
        $rubric->delete();

      
        return redirect()->route('rubrics.index')->with('success', 'Rubrique supprimée avec succès.');
    }

  
    // QuestionController.php (show method)
public function show(Question $question)
{
    $question->load('rubric'); // Eager load the rubric relationship
    return view('questions.show', compact('question'));
}

}
