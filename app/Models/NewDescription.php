<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewDescription extends Model
{
    //
    protected $table = 'news_description';


    public function language(){

        return $this->belongsTo('App\Models\Language','lang_id');
    }

    public function news(){
        return $this->belongsTO('App\Models\News','new_id');
    }

}
