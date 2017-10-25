<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageSystem extends Model
{
    //
    protected  $table = 'images';

    public function description()
    {
        return $this->hasMany('App\Models\ImageSystemDescription','image_id');
    }
}
