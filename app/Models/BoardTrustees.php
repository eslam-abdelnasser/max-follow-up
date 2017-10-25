<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoardTrustees extends Model
{
    //
    protected $table = 'board-trustees';

    public function description()
    {
        return $this->hasMany('App\Models\BoardTrusteesDescription','');
    }
}
