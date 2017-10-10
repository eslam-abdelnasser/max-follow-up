<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryDescription extends Model
{
    //
    protected $table = 'gallery-description';

    public function language(){

        return $this->belongsTo('App\Models\Language','lang_id');
    }
}
