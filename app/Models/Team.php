<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //

    protected $table = 'team' ;

    public function description(){
        return $this->hasMany('App\Models\TeamDescripiton','team_id');
    }
}
