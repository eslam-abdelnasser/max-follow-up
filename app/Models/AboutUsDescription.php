<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutUsDescription extends Model
{
    //
    protected $table = 'about-description';
    protected $fillable = ['id' , 'about_id' , 'lang_id'];



    public function about(){
        return $this->hasMany('App\Models\About','about_id');
    }

    public function language(){

        return $this->belongsTo('App\Models\Language','lang_id');
    }
}
