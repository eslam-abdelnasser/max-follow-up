<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestimonialDescription extends Model
{
    //
    protected $table = 'testimonial-description' ;

    public function language()
    {
        return $this->belongsTO('App\Models\Language','lang_id');
    }
}
