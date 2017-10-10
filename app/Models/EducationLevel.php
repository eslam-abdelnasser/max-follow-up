<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EducationLevel extends Model
{
    //
    protected $table = 'education_levels';
    public function language(){

        return $this->belongsTo('App\Models\Language','lang_id');
    }

}
