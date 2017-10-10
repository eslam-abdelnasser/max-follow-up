<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    protected $table = 'news';


    public function description(){

        return $this->hasMany('App\Models\NewDescription','new_id');
    }
}
