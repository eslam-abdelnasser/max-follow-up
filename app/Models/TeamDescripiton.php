<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamDescripiton extends Model
{
    //
    protected  $table = 'team-description';

    public function language(){

        return $this->belongsTo('App\Models\Language','lang_id');
    }
}
