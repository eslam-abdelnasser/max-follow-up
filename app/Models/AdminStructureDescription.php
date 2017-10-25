<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminStructureDescription extends Model
{
    //
    protected $table = 'admin-structure-description';

    public function language()
    {
        return $this->belongsTo('App\Models\Language','lang_id');
    }
}
