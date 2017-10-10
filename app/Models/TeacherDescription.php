<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherDescription extends Model
{
    //
    protected $table = 'teachers_description';

    public function teacher(){
        return $this->belongsTO('App\Models\Teacher','teacher_id');
    }


    public function language(){

        return $this->belongsTo('App\Models\Language','lang_id');
    }
}
