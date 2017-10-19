<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhoDescription extends Model
{
    //
    protected $table = 'who-description';
    protected $fillable = ['id' , 'who_id' , 'lang_id'];



    public function about(){
        return $this->hasMany('App\Models\Who','who_id');
    }

    public function language(){

        return $this->belongsTo('App\Models\Language','lang_id');
    }
}
