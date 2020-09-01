<?php

namespace App\Http\Controllers;

use App\Question;
use App\Questionnaire;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    


    public function create(Questionnaire $questionnaire) {
      return view('question.create', compact('questionnaire'));
    }



    public function store(Questionnaire $questionnaire) {
      // dd($request->all());
      $data = request()->validate([
        'question.question' => 'required',                                // dans validate(), . permet d'accéder à un éléments d'un tableau
        'answers.*.answer' => 'required',                                 // dans validate(), * permet d'accéder aux éléments d'un tableau 
      ]);
      // dd($data['question']);
      $question = $questionnaire->questions()->create($data['question']); // Dans l'obj questionnaire, exécute questions() qui lie l'obj question et y exécute create()
      $question->answers()->createMany($data['answers']);                 // Dans l'obj question, exécute answers() qui contient l'obj answer et y exécute create()
      return redirect('/questionnaires/' . $questionnaire->id);           // Load  la page /questionnaires/{id}
  }




}
