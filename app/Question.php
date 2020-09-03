<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];

    ##################################
    # Databases relations
    ##################################

    public function questionnaire() {
        return $this->belongsTo(Questionnaire::class);          // Une question appartient à un formulaire
    }

    public function answers() {
        return $this->hasMany(Answer::class);                   // Plusieurs choix de réponse sont associés à une question
    }

    public function responses() {
        return $this->hasMany(SurveyResponse::class);           // Plusieurs SurveyResponse répondent à la même question
    }

}
