<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhyUs extends Model
{
    //
    protected $table = 'why-us';

    public function description(){
        return $this->hasMany('App\Models\WhyUsDescription','why_id');
    }
}
