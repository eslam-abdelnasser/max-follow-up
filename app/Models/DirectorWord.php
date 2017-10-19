<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DirectorWord extends Model
{
    //
    protected $table = 'director-words';
    protected $fillable = ['id'];

    public function description(){
        return $this->hasMany('App\Models\DirectorWordDescription','director_id');
    }
}
