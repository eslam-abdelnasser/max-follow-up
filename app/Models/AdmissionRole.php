<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdmissionRole extends Model
{
    //
    protected $table = 'admission_roles';
    public function language(){

        return $this->belongsTo('App\Models\Language','lang_id');
    }

}
