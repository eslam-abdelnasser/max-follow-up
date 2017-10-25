<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqDescription extends Model
{
    //
    protected  $table = 'faq-description';

    public function language()
    {
        return $this->belongsTo('App\Models\Language','lang_id');
    }
}
