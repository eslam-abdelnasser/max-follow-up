<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaboratoryDescription extends Model
{
    //
    protected $table = 'laboratory_description';


    public function language(){

        return $this->belongsTo('App\Models\Language','lang_id');
    }

    public function laboratory(){
        return $this->belongsTO('App\Models\Laboratory','laboratory_id');
    }
}
