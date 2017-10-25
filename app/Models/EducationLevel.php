<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EducationLevel extends Model
{
    //
    protected $table = 'education-level';

    public function description()
    {
        return $this->hasMany('App\Models\EducationLevelDescription','education_level_id');
    }

    public function images()
    {
        return $this->hasMany('App\Models\ImageEducationLevel','education_level_id');
    }
}
