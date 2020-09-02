<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyResponse extends Model
{
    protected $guarded = [];

    ##################################
    # Database relations
    ##################################

    public function survey() {
        return $this->belongsTo(Survey::class);
    }

}
