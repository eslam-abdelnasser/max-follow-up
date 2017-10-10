<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    //
    public function description(){

        return $this->hasMany('App\Models\ActivityDescription','activity_id');
    }
}
