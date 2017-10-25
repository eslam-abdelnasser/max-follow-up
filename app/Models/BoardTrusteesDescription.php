<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoardTrusteesDescription extends Model
{
    //
    protected $table = 'board-trustees-description';

    public function language()
    {
        return $this->belongsTo('App\Models\Language','lang_id');
    }
}
