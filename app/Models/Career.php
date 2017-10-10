<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    //
    public function description(){

        return $this->hasMany('App\Models\CareerDescription','career_id');
    }
}
