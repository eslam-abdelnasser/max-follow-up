<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Who extends Model
{
    //
    protected $table = 'who';
    protected $fillable = ['id'];

    public function description(){
        return $this->hasMany('App\Models\WhoDescription','who_id');
    }
}
