<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    //
    protected $table = 'about-us';
    protected $fillable = ['id','image_url'];

    public function description(){
        return $this->hasMany('App\Models\AboutUsDescription','about_id');
    }
}
