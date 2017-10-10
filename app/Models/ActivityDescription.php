<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityDescription extends Model
{
    //
    protected $table = 'activities_description';


    public function language(){

        return $this->belongsTo('App\Models\Language','lang_id');
    }

    public function activities(){
        return $this->belongsTO('App\Models\Activity','activity_id');
    }
}
