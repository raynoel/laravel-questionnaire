<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaire;

class SurveyController extends Controller
{

    // Affiche 1 sondage
    public function show(Questionnaire $questionnaire, $slug) {
        $questionnaire->load('questions.answers');                          // Lazyload les questions appartenant au questionnaire + les choix de réponse appartenant aux questions
        return view('survey.show', compact('questionnaire'));
    }


    // Enregistre le sondage dans la table surveys et la ta
    public function store(Questionnaire $questionnaire) {
        // dd(request()->all());
        $data = request()->validate([
            'responses.*.answer_id' => 'required',
            'responses.*.question_id' => 'required',
            'survey.name' => 'required',
            'survey.email' => 'required|email'
        ]);

        $survey = $questionnaire->surveys()->create($data['survey']);       // Enregistre 'nom' + 'courriel' dans la DB 'Survey'
        $survey->responses()->createMany($data['responses']);               // Enregistre les réponses dans la DB 'SurveyResponse'
        return 'Merci';
    }
}
