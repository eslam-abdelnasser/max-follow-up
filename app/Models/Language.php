<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    //
    public function faqs(){

        return $this->hasMany('App\Models\Faq');
    }
}
