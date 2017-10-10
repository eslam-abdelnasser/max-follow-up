<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SliderDescription extends Model
{
    //
    protected $table='slider-description';
    protected $fillable = ['description', 'slider_id' , 'lang_id','title_first','title_second'];

    public function language(){

        return $this->belongsTo('App\Models\Language' , 'lang_id');
    }
}
