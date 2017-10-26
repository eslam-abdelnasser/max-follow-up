<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeachingStuff extends Model
{
    //
    protected $table = 'teaching-stuff' ;

    public function description()
    {
        return $this->hasMany('App\Models\TeachingStuffDescription', 'teaching_stuff_id');
    }
}
