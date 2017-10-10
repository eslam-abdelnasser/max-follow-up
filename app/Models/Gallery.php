<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    //

    protected  $table ='galleries';

    public function description(){
        return $this->hasMany('App\Models\GalleryDescription','gallery_id');
    }

    public function media(){
        return $this->hasMany('App\Models\Media','gallery_id');
    }
}
