<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //

    public function description(){

        return $this->hasMany('App\Models\ServiceDescription','service_id');
    }
}
