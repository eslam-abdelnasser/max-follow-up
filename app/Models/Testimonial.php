<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    //
    protected  $table =  'testimonials';

    public function description()
    {
        return $this->hasMany('App\Models\TestimonialDescription','testimonial_id');
    }
}
