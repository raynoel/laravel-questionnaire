<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    protected $guarded = [];

    ##################################
    # Database relations
    ##################################

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
