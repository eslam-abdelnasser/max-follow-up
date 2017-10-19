<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhyUsDescription extends Model
{
    //
    protected  $table ='why-us-description';


    public function language(){
        return $this->belongsTo('App\Models\Language','lang_id');
    }
}
