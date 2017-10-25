<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    //
    protected $table = 'faq';


    public function description()
    {
        return $this->hasMany('App\Models\FaqDescription','faq_id');
    }
}
