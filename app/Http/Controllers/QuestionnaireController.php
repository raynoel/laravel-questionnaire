<?php

namespace App\Http\Controllers;

use App\Questionnaire;

use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{

    public function __construct() {
        $this->middleware('auth');                                               // Seulement un usagé enregistrée peut utiliser la classe
    }


    // Affiche un formulaire pour créer un questionnaire
    public function create() 
    {
        return view('questionnaire.create');
    }


    // Enregistre un nouveau questionnaire dans la DB
    public function store() {
        $data = request()->validate([
            'title' => 'required',
            'purpose' => 'required',
        ]);
        $data['user_id'] = auth()->user()->id;
        $questionnaire = Questionnaire::create($data);                              // Retourne un objet
        // $questionnaire = auth()->user()->questionnaire->create();                // Utilise la relation de User & Questionnaire et utilise la méthode create()
        return redirect('/questionnaires/'.$questionnaire->id);
    }


    // Affiche 1 questionnaire{id}
    public function show(Questionnaire $questionnaire) {
        $questionnaire->load('questions.answers');                                 // Lazyload les question appartenant au sondage + les choix de réponses appartenant au questions
        // dd($questionnaire);
        return view('questionnaire.show', compact('questionnaire'));
    }


}
