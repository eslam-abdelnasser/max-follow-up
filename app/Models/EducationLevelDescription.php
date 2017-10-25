<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EducationLevelDescription extends Model
{
    //
    protected $table = 'education-level-description';

    public function language()
    {
        return $this->belongsTo('App\Models\Language','lang_id');
    }
}
