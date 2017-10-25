<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    //
    protected  $table =  'testimonial';

    public function description()
    {
        return $this->hasMany('App\Models\Testimonial','testimonial_id');
    }
}
