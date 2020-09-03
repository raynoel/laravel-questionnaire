<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $guarded = [];

    ##################################
    # Databases relations
    ##################################

    public function question() {
        return $this->belongsTo(Question::class);
    }


    public function responses() {
        return $this->hasMany(SurveyResponse::class);                   // Une réponse peut être choisie dans plusieurs sondage
    }


}