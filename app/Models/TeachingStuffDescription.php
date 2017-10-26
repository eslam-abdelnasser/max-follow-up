<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeachingStuffDescription extends Model
{
    //
    protected  $table = 'teaching-stuff-description';

    public function language(){

        return $this->belongsTo('App\Models\Language','lang_id');
    }

}
