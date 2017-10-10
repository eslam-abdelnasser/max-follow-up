<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    //
    protected $table = 'sliders';

    public function description(){

        return $this->hasMany('App\Models\SliderDescription','slider_id');
    }
}
