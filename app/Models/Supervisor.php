<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    //
    protected $table = "supervisors";
    public function language(){

        return $this->belongsTo('App\Models\Language','lang_id');
    }
}

