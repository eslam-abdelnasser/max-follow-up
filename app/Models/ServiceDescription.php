<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceDescription extends Model
{
    //
    protected $table = 'service-description';



    public function language(){

        return $this->belongsTo('App\Models\Language','lang_id');
    }

    public function service(){
        return $this->belongsTO('App\Models\Service','service_id');
    }

}
