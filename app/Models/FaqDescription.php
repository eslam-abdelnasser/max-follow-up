<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqDescription extends Model
{
    //
    protected  $table = 'faq-testimonial';

    public function language()
    {
        return $this->belongsTo('App\Models\Language','lang_id');
    }
}
