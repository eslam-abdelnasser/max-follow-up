<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsDescription extends Model
{
    //
    protected  $table = 'news-description';

    public function language()
    {
        return $this->belongsTo('App\Models\Language','lang_id');
    }

}
