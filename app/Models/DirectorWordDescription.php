<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DirectorWordDescription extends Model
{
    //
    protected $table = 'director-words-description';
    protected $fillable = ['id' , 'director_id' , 'lang_id'];





    public function language(){

        return $this->belongsTo('App\Models\Language','lang_id');
    }
}
