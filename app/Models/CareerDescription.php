<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerDescription extends Model
{
    //
    protected $table = 'career_descriptions';


    public function language(){

        return $this->belongsTo('App\Models\Language','lang_id');
    }

    public function blog(){
        return $this->belongsTO('App\Models\Career','career_id');
    }
}
